@extends('layouts/admin/layout/main')

@section('title', 'Edit Sub-Category')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Edit Sub-Category
            </h4>
        </div>
        <div class="card-body">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action="{{ route('sub-category.update', $subCategory) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Sub_Category Name</label>
                            <input type="text" class="form-control" name="sub_category_name" value="{{ $subCategory->sub_category_name }}"  />
                            @error('sub_category_name')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">Category Name</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected': ''}} >{{ $category->category_name }}</option>
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