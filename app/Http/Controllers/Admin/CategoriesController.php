<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\Filter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use Throwable;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $categories = Category::leftJoin('categories as parents','parents.id','=','categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_num'
        ])
        ->where('categories.status' , '=', 'active')
        ->orderBy('categories.name','DESC')
        ->paginate(10, ['*']);
        return view('admin/categories/index',[
            'categories'=> $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $prevCategories = new Category();
        $categories = Category::all('id','name','parent_id');
        return view('admin/categories/create',[
        'categories'=> $categories,
        'prevCategories' => $prevCategories
    ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {     
        $rules = [
            'name' => ['required',
                     'min:3', 
                    'string', 
                    'max:255',
                    // function ($attribute, $value, $fail) 
                    //     {
                    //         if(stripos($value, 'gad') !== false){
                    //             $fail("you can't put $value word");
                    //         }
                    //     }
                    new Filter(['larval' , 'php', 'gat'])
                ],
            'parent_id'=>['nullable', 'int','exists:categories,id'],
            'description' => ['nullable', 'min:3', 'string'],
            'status'=> ['required', 'in:active,draft'],
            'image'=> ['nullable', 'image', 'dimantion:min-width:300px']
        ];
        try{
            $date = $request->all();
            $validation =  FacadesValidator::make($date, $rules,[
                'required.name' => 'Category Name'
            ]);
            $msg = $validation->errors()->all();
            $clean = $validation->validate();

        }catch(Throwable $e){
            // dd();
            return redirect()->route('categories.create')->withErrors($validation)->withInput() ;       
          }
        $name = $request->name; 
        $request->merge([
            'slug' => Str::slug($name),
            'status' => 'active',
            
        ]);
        $category = new Category($request->all());
        $category->save();
        // dd($category);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories1 = Category::where('id', '<>', '$id')->get();
        $categories2 = Category::findOrFail($id);
       
        return view('admin/categories/edit',[
            "categories" => $categories1,
            "prevCategories" => $categories2,
          
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //   
        Category::where('id','=',$id)->update($request->except(['_token', '_method']));
       return redirect()->route('categories.index')->with('succuss', 'Category Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::where('id', '=' , $id)->delete();
       return redirect()->route('categories.index')->with('delete', 'Category Deleted');

    }
}
