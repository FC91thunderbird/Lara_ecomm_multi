@extends('layouts/admin/layout/main')

@section('title', 'Add Slider')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Add new Slider</h4>
            <a href="{{ route('slider.index') }}" class="dt-button create-new btn btn-primary" type="button">Back</a>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('slider.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="slider_status" value="1" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Active Status</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Slider Name</label>
                            <input type="text" class="form-control" name="slider_name" placeholder="slider Name" />
                            @error('slider_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Slider title</label>
                            <input type="text" class="form-control" name="slider_title" placeholder="slider title" />
                            @error('slider_title')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Slider Description</label>
                            <textarea class="form-control" name="slider_description" rows="3" required></textarea>
                            @error('slider_description')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-vertical">Slider Image</label>
                            <input class="form-control" type="file" name="slider_image" onchange="sliderShow(this)">
                            @error('slider_image')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                            <img src="" id="sliderImage" alt="">
                        </div>
                    </div>
                    
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
        function sliderShow(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#sliderImage').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection