@extends('frontend/layouts/main')

@section('title', 'Product Details')

@section('styles')
<link rel="stylesheet" href="{{  asset('frontend/css/product-details.css') }}">
@endsection
@section('content')
<section class="single-banner inner-section" style="background: url(images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>{{ $products->product_name }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="shop-4column.html">shop-4column</a></li>
            <li class="breadcrumb-item active" aria-current="page">product-tab</li>
        </ol>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="details-gallery">
                    <div class="details-label-group">
                        <label class="details-label new">new</label>
                        @php
                            $discount_amount = (($products->selling_price-$products->discount_price)/($products->selling_price))*100
                        @endphp
                        <label class="details-label off">{{ round($discount_amount) }}%</label>
                    </div>
                    <ul class="details-preview">
                        @foreach($products->images as $images)
                            <li><img src="{{ asset($images->photo_name) }}" alt="product"></li>
                        @endforeach
                    </ul>
                    <ul class="details-thumb">
                        @foreach($products->images as $images)
                            <li><img src="{{ asset($images->photo_name) }}" alt="product" height="70px" width="70p"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details-content">
                    <h3 class="details-name" id="pname"><a href="#">{{ $products->product_name }}</a></h3>
                    <div class="details-meta">
                        <p>SKU:<span>{{ $products->product_qty }}</span></p>
                        <p>BRAND:<a href="#">{{ $products->category->category_name }}</a></p>
                    </div>

                    <h3 class="details-price">
                        <del>${{ $products->purchase_price }}</del>
                        <span>${{ $products->selling_price }}</span>
                    </h3>
                    <p class="details-desc">{{ $products->short_description }}</p>
                    <div class="details-list-group">
                        <label class="details-list-title">tags:</label>
                        <ul class="details-tag-list">
                            <li><a href="#">{{ $products->product_tags }}</a></li>
                        </ul>
                    </div>
                    <div class="details-list-group">
                        <label class="details-list-title">Share:</label>
                        <ul class="details-share-list">
                            <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                            <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                            <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                            <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                        </ul>
                    </div>
                    <div class="details-add-group">
                    <input type="number" name="quantity" id="product_qty" value="1" min="1">
                    <input type="hidden" id="product_id" value="{{ $products->id }}" min="1">
                        <button type="submit" onclick="addToCart()" >
                            <i class="fas fa-shopping-basket"></i>
                            <span>add to cart</span>
                        </button>
                    </div>
                    <div class="details-action-group">
                        <a class="details-wish wish" href="#" title="Add Your Wishlist">
                            <i class="icofont-heart"></i>
                            <span>add to wish</span>
                        </a>
                        <a class="details-compare" href="compare.html" title="Compare This Item">
                            <i class="fas fa-random"></i>
                            <span>Compare This</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                    <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">Specifications</a></li>
                    <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">reviews (2)</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade show active" id="tab-desc">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <div class="tab-descrip">
                            <p>{{ $products->long_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-spec">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Product code</th>
                                    <td>SKU: 101783</td>
                                </tr>
                                <tr>
                                    <th scope="row">Weight</th>
                                    <td>1kg, 2kg</td>
                                </tr>
                                <tr>
                                    <th scope="row">Styles</th>
                                    <td>@Girly</td>
                                </tr>
                                <tr>
                                    <th scope="row">Properties</th>
                                    <td>Short Dress</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-reve">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <ul class="review-list">
                            <li class="review-item">
                                <div class="review-media">
                                    <a class="review-avatar" href="#">
                                        <img src="images/avatar/01.jpg" alt="review">
                                    </a>
                                    <h5 class="review-meta">
                                        <a href="#">miron mahmud</a>
                                        <span>June 02, 2020</span>
                                    </h5>
                                </div>
                                <ul class="review-rating">
                                    <li class="icofont-ui-rating"></li>
                                    <li class="icofont-ui-rating"></li>
                                    <li class="icofont-ui-rating"></li>
                                    <li class="icofont-ui-rating"></li>
                                    <li class="icofont-ui-rate-blank"></li>
                                </ul>
                                <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                <form class="review-reply">
                                    <input type="text" placeholder="reply your thoughts">
                                    <button><i class="icofont-reply"></i>reply</button>
                                </form>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="product-details-frame">
                        <h3 class="frame-title">add your review</h3>
                        <form class="review-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="star-rating">
                                        <input type="radio" name="rating" id="star-1"><label for="star-1"></label>
                                        <input type="radio" name="rating" id="star-2"><label for="star-2"></label>
                                        <input type="radio" name="rating" id="star-3"><label for="star-3"></label>
                                        <input type="radio" name="rating" id="star-4"><label for="star-4"></label>
                                        <input type="radio" name="rating" id="star-5"><label for="star-5"></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Describe"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-inline">
                                        <i class="icofont-water-drop"></i>
                                        <span>drop your review</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection