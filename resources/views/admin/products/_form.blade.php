
{{-- {{dd($categories->all())}}  --}}
<link rel="stylesheet" href="{{asset('assets/admin/formStyle/main.css')}}">
<div class="form-group">
   <x-form-input  name ="name" label = "Name Of Category" :value = '$prevProducts->name'/>
     {{-- <label for="">Name Of Category</label>
     <input type="text" name="name" value="{{old('name', $prevProducts->name)}}"> --}}
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea name="description" class=" form-control @error('description') is-invalid @enderror" cols="60" rows="3">{{old('description', $prevProducts->description)}}</textarea>
    <p class="invalid-feedback"> @error('description') {{$message}}   @enderror
  </div>
<div class="form-group">
  <label for="">Image</label>
  
  <img src="{{old('image', $prevProducts->image_path)}}" style="width: 50px; height: 50px">
   <input type="file" name="image" class="@error('image') is-invalid @enderror" value="{{old('image', $prevProducts->image_path)}}">
   <p class="invalid-feedback"> @error('image') {{$message}}   @enderror </p>

</div>
<div class="form-group">
    <label for="" class="" >Category Name</label>
    <select name="category_id" class=" form-control @error('category_id') is-invalid @enderror" id="category_id" class="form-control" style="display:inline-block; margin:0">
      <option value=''>Select Category</option>
      @foreach ($categories as $category)
          <option class="form-group" value={{$category->id }} @if ($category->id == old('category_id',$prevProducts->category_id))
            selected
          @endif>{{$category->name}}</option>
      @endforeach      
    </select>
    <p class="invalid-feedback"> @error('category_id') {{$message}}   @enderror

</div>
<div class="form-group">
  <label for="">Price</label>
  <input type="text" class=" form-control @error('price') is-invalid @enderror" name="price" value={{old('price', $prevProducts->price)}}>
  <p class="invalid-feedback"> @error('price') {{$message}}  
    @enderror
  
  </p>
</div>
<div class="form-group">
  <label for="">Sale Price</label>
  <input type="text" class=" form-control @error('sale_price') is-invalid @enderror" name="sale_price" value={{old('sale_price', $prevProducts->sale_price)}}>
  <p class="invalid-feedback"> @error('sale_price') {{$message}}  
    @enderror
  
  </p>
</div>
<div class="form-group">
  <label for="">Quantity</label>
  <input type="text" class=" form-control @error('quantity') is-invalid @enderror" name="quantity" value={{old('quantity', $prevProducts->quantity)}}>
  <p class="invalid-feedback"> @error('quantity') {{$message}}  
    @enderror
  
  </p>
</div>
<div class="form-group">
  <label for="">SKU</label>
  <input type="text" class=" form-control @error('sku') is-invalid @enderror" name="sku" value={{old('sku', $prevProducts->sku)}}>
  <p class="invalid-feedback"> @error('sku') {{$message}}  
    @enderror
  
  </p>
</div>
<div class="form-group">
  <label for="">Wight</label>
  <input type="text" class=" form-control @error('wight') is-invalid @enderror" name="wight" value={{old('wight', $prevProducts->wight)}}>
  <p class="invalid-feedback"> @error('wight') {{$message}}  
    @enderror
  
  </p>
</div>
<div class="form-group">
  <label for="">Width</label>
  <input type="text" class=" form-control @error('width') is-invalid @enderror" name="width" value={{old('width', $prevProducts->width)}}>
  <p class="invalid-feedback"> @error('width') {{$message}}  
    @enderror
  </p>
</div>
<div class="form-group">
  <label for="">Height</label>
  <input type="text" class=" form-control @error('height') is-invalid @enderror" name="height" value={{old('height', $prevProducts->height)}}>
  <p class="invalid-feedback"> @error('height') {{$message}}  
    @enderror
  </p>
</div>
<div class="form-group">
  <label for="">Length</label>
  <input type="text" class=" form-control @error('length') is-invalid @enderror" name="length" value={{old('length', $prevProducts->length)}}>
  <p class="invalid-feedback"> @error('length') {{$message}}  
    @enderror
  </p>
</div>
<div class="form-group">
  <label for="">Status</label>
  <input type="radio" value="active" class="@error('status') is-invalid @enderror" name="status" id="status"  style="margin-left: -10px" @if (old('status',$prevProducts->status) == 'active')
  checked
  @endif> <label for="Active">Active</label>
  <input type="radio" value="draft" class="@error('status') is-invalid @enderror" name="status" id="status" style="margin-left: -10px" @if (old('status',$prevProducts->status) == 'draft')
  checked
  @endif> <label for="Active">Draft</label>
  <p class="invalid-feedback"> @error('status') {{$message}}   @enderror
</div>
<div class="form-group">
  <button type="submit" class=" btn btn-primary" style="width: 8%; font-size:18px; margin:auto">{{$btn}}</button>
</div>