<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products =  Product::join('categories', 'categories.id', '=' ,'products.category_id')
        ->select([
            'products.*',
            'categories.name as category_name'
        ])
        ->orderBy('updated_at', 'DESC')
        ->paginate();
        return view('Admin/products/index' , [
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $prevProducts =new Product();
        $categories = Category::all();
        return view('admin/products/create', [
            'prevProducts' =>$prevProducts,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $name = $request->name;
        $request->merge([
            'slug' => Str::slug($name),
        ]);
        
        $newProduct = Product::create($request->except('_token','_method'));
        $newProduct->save();
        return redirect()->route('products.index')->with('succuss', 'The '. $name . ' Product Added');

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
        $category = Category::get(['id', 'name']);
        
        $prevCategories  = Product::findOrFail($id);
        return view('admin/products/edit',[
            'prevProducts' => $prevCategories ,
            'categories'=> $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {   
        // dd($id);
        // $request->validate([   
        //     'name' => Rule::unique('products')->ignore($id),
        // ]);
        Product::where('id','=',$id)->update($request->except('_token', '_method'));
       return redirect()->route('products.index')->with('succuss', 'Product'. Product::where('id', '=', $id)->first('name')->name  .'Updated');
        
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
        $name = Product::where('id', '=', $id)->first('name')->name;
        Product::where('id', '=' , $id)->delete();
       return redirect()->route('products.index')->with('delete', 'Product '. $name  .' was Deleted');

    }
}
