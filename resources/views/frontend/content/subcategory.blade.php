@extends('frontend/layouts/main')

@section('title', 'Sub-category')

@section('content')
<section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>{{ $category->category_name}}</h2>
            </div>
        </section>
<section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-filter">
                            <div class="filter-show">
                                <label class="filter-label">Show :</label>
                                <select class="form-select filter-select">
                                    <option value="1">12</option>
                                    <option value="2">24</option>
                                    <option value="3">36</option>
                                </select>
                            </div>
                            <div class="filter-short">
                                <label class="filter-label">Short by :</label>
                                <select class="form-select filter-select">
                                    <option selected>default</option>
                                    <option value="3">trending</option>
                                    <option value="1">featured</option>
                                    <option value="2">recommend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 justify-content-center">
                    @foreach($subcategories as $subcat)
                    <div class="col">
                        <div class="category-wrap">
                            <div class="category-media">
                                <img src="{{ $subcat->sub_category_name }}" alt="{{ $subcat->sub_category_name }}">
                                <div class="category-overlay">
                                    <a href="{{ route('sub-category-product',['id'=>$subcat->id, 'slug'=>$subcat->sub_category_slug]) }}"><i class="fas fa-link"></i></a>
                                </div>
                            </div>
                            <div class="category-meta">
                                <h4>{{ $subcat->sub_category_name }}</h4>
                                <p> Count PR</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bottom-paginate">
                            <ul class="pagination">
                                {{ $subcategories->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection