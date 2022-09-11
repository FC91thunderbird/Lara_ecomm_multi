@extends('layouts/admin/layout/main')

@section('title', 'Edit Product')


@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Product</h4>
            <a href="{{ route('product.index') }}" class="dt-button create-new btn btn-primary" type="button">Edit</a>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product) }}">
            @method('PUT')    
            @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Category</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
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
                            <select class="form-select" name="subcategory_id">
                            @foreach($subcategories as $sub)
                                <option value="{{ $sub->id }}" {{ $sub->id == $product->subcategory_id ? 'selected' : '' }}> {{ $sub->sub_category_name }} </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" />
                            @error('product_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product code</label>
                            <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" />
                            @error('product_code')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product qty</label>
                            <input type="number" class="form-control" name="product_qty" value="{{ $product->product_qty }}" />
                            @error('product_qty')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product tags</label>
                            <input type="text" class="form-control" name="product_tags" value="{{ $product->product_tags }}" />
                            @error('product_tags')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product size</label>
                            <input type="text" class="form-control" name="product_size" value="{{ $product->product_size }}" />
                            @error('product_size')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product color</label>
                            <input type="text" class="form-control" name="product_color" value="{{ $product->product_color }}" />
                            @error('product_color')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product purchase price</label>
                            <input type="number" class="form-control" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}" />
                            @error('purchase_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product Selling price</label>
                            <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}" />
                            @error('selling_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Product discount price</label>
                            <input type="number" class="form-control" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" />
                            @error('discount_price')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> short description</label>
                            <textarea class="form-control" name="short_description" rows="3" required>{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Long description</label>
                            <textarea class="form-control" name="long_description" rows="3">{{ old('long_description', $product->long_description) }}</textarea>
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
                            <img class="img-fluid rounded mt-1" src="{{ asset($product->product_thumbnail) }}" id="mainThumbnail" alt="" height="100px" width="100px">
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
                        <input class="form-check-input" type="checkbox" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'checked': '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">Hot Deals</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="featured" value="1" {{ $product->featured == 1 ? 'checked': '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">Featured</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="new_arrival" value="1" {{ $product->new_arrival == 1 ? 'checked': '' }} >
                        <label class="form-check-label" for="inlineCheckbox1">Featured</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked': '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">special_offer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked': '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">special_deals</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="status" value="1" {{ $product->status == 1 ? 'checked': '' }}>
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

<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border d-flex justify-content-between align-items-center">
                <h3 class="box-title">Update Product Multi Image</h3>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back List Product</a>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        @foreach($product->images as $img)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 100px; width: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                </h5>
                            <p class="card-text">
                                <div class="form-group">
                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file"
                                name="multi_img[ {{ $img->id }} ]">
                                </div>
                            </p>
                            </div>
                        </div>
                    </div><!--  end col md 3		 -->
                        @endforeach
                    </div>
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                    </div>
                    <br><br>
                </form>
            </div>
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