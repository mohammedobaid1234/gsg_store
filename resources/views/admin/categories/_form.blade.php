<div class="form-group">
    <label for="">Name Of Category</label>
    <input type="text" name="name" value={{$prevCategories->name}}>
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="" cols="60" rows="3">{{$prevCategories->description}}</textarea>
</div>
<div class="form-group">
    <div class="file-upload">
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
      
        <div class="image-upload-wrap">
          <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
          <div class="drag-text">
            <h3>Drag and drop a file or select add Image</h3>
          </div>
        </div>
        <div class="file-upload-content">
          <img class="file-upload-image" src={{$prevCategories->image_path}} alt="your image" />
          <div class="image-title-wrap">
            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
          </div>
        </div>
      </div>
</div>
<div class="form-group">
    <label for="" class=""  style="margin-right:-30px">Parent ID</label>
    <select name="parent_id" id="parent_id" class="form-control" style="width: 70%; display:inline-block; margin:0">
      <option value='null'>No Perent</option>
      @foreach ($categories as $category)
          <option class="form-group" value={{$category->id}} @if ($category->id == $prevCategories->parent_id)
            selected
          @endif>{{$category->name}}</option>
      @endforeach      
    </select>
</div>
<div class="form-group">
  <button type="submit" class=" btn btn-primary" style="width: 20%; font-size:18px; margin:auto">{{$btn}}</button>
</div>