<link rel="stylesheet" href="{{asset('assets/admin/formStyle/main.css')}}">
<div class="form-group">
    <label for="">Name Of Category</label>
    <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name" value={{old('name', $prevCategories->name)}}>
    <p class="invalid-feedback"> @error('name') {{$message}}  
      @enderror
    
    </p>
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea name="description" class=" form-control @error('description') is-invalid @enderror" cols="60" rows="3">{{old('description', $prevCategories->description)}}</textarea>
    <p class="invalid-feedback"> @error('description') {{$message}}   @enderror
  </div>
<div class="form-group">
  <label for="">Description</label>
  <img src="{{old('image', $prevCategories->image_path)}}" style="width: 50px; height: 50px">
   <input type="file" name="image" class="@error('image') is-invalid @enderror" value="{{old('image', $prevCategories->image_path)}}">
   <p class="invalid-feedback"> @error('image') {{$message}}   @enderror </p>

</div>
<div class="form-group">
    <label for="" class="" >Parent ID</label>
    <select name="parent_id" class=" form-control @error('parent_id') is-invalid @enderror" id="parent_id" class="form-control" style="display:inline-block; margin:0">
      <option value=''>No Perent</option>
      @foreach ($categories as $category)
          <option class="form-group" value={{$category->id}} @if ($category->id == old('parent_id',$prevCategories->parent_id))
            selected
          @endif>{{$category->name}}</option>
      @endforeach      
    </select>
    <p class="invalid-feedback"> @error('parent_id') {{$message}}   @enderror

</div>
<div class="form-group">
  <button type="submit" class=" btn btn-primary" style="width: 8%; font-size:18px; margin:auto">{{$btn}}</button>
</div>