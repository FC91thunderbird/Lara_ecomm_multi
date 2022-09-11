@extends('layouts/admin/layout/main')

@section('title', 'Edit Category')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Add Category
            </h4>
        </div>
        <div class="card-body">
        <button id="type-success" class="btn btn-success">Success</button>
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('category.update', $category) }}">
            @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Name</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" />
                            @error('category_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Description</label>
                            <textarea class="form-control" name="category_description" rows="3" required>{{ $category->category_description }}</textarea>
                            @error('category_description')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-vertical">Category Image</label>
                            <input class="form-control" type="file" name="category_image">
                            @error('category_image')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                                <img  id="show-image" src="{{ !empty($category->category_image) ? url(''.$category->category_image) : url('upload/default/default.jpg') }}" alt="User Avatar" width="100px" height="100px">
                                </div>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1">Update</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    

@endsection