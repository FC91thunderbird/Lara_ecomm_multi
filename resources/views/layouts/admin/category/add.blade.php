@extends('layouts/admin/layout/main')

@section('title', 'Add Category')

@section('styles')


@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Add Category
            </h4>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('category.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Category Name" />
                            @error('category_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Description</label>
                            <textarea class="form-control" name="category_description" rows="3" required></textarea>
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
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    

@endsection