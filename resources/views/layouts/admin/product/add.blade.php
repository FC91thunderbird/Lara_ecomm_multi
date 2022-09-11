@extends('layouts/admin/layout/main')

@section('title', 'Add Product')


@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Category</h4>
            <a href="{{ route('product.index') }}" class="dt-button create-new btn btn-primary" type="button">Edit</a>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Category</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Sub Category</label>
                            <select class="form-select" name="subcategory_id" aria-label="Default select example">
                                <option value="" selected="" disabled="">Select SubCategory Name</option>
                            </select>
                            @error('subcategory_id')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" placeholder="product Name" />
                            @error('product_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product code</label>
                            <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" placeholder="product code " />
                            @error('product_code')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product qty</label>
                            <input type="number" class="form-control" name="product_qty" value="{{ old('product_qty') }}" placeholder="product qty" />
                            @error('product_qty')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product tags</label>
                            <input type="text" class="form-control" name="product_tags" value="{{ old('product_tags') }}" placeholder="product tags" />
                            @error('product_tags')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product size</label>
                            <input type="text" class="form-control" name="product_size" value="{{ old('product_size') }}" placeholder="product size" value="small,medium,large" />
                            @error('product_size')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product color</label>
                            <input type="text" class="form-control" name="product_color" value="{{ old('product_color') }}" placeholder="product color" value="red,green,blue" />
                            @error('product_color')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product purchase price</label>
                            <input type="number" class="form-control" name="purchase_price" value="{{ old('purchase_price') }}" placeholder="product price" />
                            @error('purchase_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product Selling price</label>
                            <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price') }}" placeholder="product selling_price" />
                            @error('selling_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product discount price</label>
                            <input type="number" class="form-control" name="discount_price" value="{{ old('discount_price') }}" placeholder="product discount_price" />
                            @error('discount_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> short description</label>
                            <textarea class="form-control" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Long description</label>
                            <textarea class="form-control" name="long_description" rows="3" required>{{ old('long_description') }}</textarea>
                            @error('long_description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-vertical">product thumbnail</label>
                            <input class="form-control" type="file" name="product_thumbnail" onChange="mainThumbnailShow(this)">
                            @error('product_thumbnail')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                            <img class="img-fluid rounded mt-1" src="" id="mainThumbnail" alt="">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-vertical">Product Multiple Image</label>
                            <input class="form-control" type="file" name="product_images[]" multiple="" id="multiImg">
                            @error('product_images')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                            <div id="preview_img"></div>
                        </div>
                    </div>


                   
                    <!-- checkbox -->
                    <div class="col-12">
                        <div class="mb-2 mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hot_deals" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Hot Deals</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="featured" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Featured</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="new_arrival" checked value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Featured</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="special_offer" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">special_offer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="special_deals" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">special_deals</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="status" checked value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Active Status</label>
                    </div>
                        </div></div>
                    
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{ url('/admin/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="subcategory_id"]').html('');
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
     
$(document).ready(function(){
    $('#multiImg').on('change', function(){ 
            var data = $(this)[0].files;

            $.each(data, function(index, file){ 
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ 
                    var fRead = new FileReader(); 
                    fRead.onload = (function(file){ 
                    return function(e) {
                        var img = $('<img/>').addClass('img-fluid rounded mt-1 me-1').attr('src', e.target.result) .width(80).height(80); 
                        $('#preview_img').append(img);
                    };
                    })(file);
                    fRead.readAsDataURL(file); 
                }
            });
    });
    });
  });
</script>
<script type="text/javascript">
    function mainThumbnailShow(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumbnail').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection