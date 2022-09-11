@extends('layouts/admin/layout/main')

@section('title', 'Add Sub-Category')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Add Sub-Category
            </h4>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('sub-category.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Sub_Category Name</label>
                            <input type="text" class="form-control" name="sub_category_name" placeholder="Category Name" />
                            @error('sub_category_name')
                            <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical"> Category</label>
                            <select class="form-select" name="category_id" id="basicSelect">
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
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    

@endsection