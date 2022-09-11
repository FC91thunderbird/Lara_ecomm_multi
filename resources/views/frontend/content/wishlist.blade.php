@extends('frontend/layouts/main')

@section('title', 'Wishlist')

@section('content')

<section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>wishlist</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">wishlist</li>
        </ol>
    </div>
</section>

<section class="inner-section wishlist-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-scroll">
                    <table class="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Name</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Price</th>
                                <th scope="col">shopping</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($wishlists as $wish)
                            @foreach ($wish->products as $product )
                            <tr>
                                <td class="table-serial">
                                    <h6>{{ $loop->index+1 }}</h6>
                                </td>
                                <td class="table-image"><img src="{{ asset($product->product_thumbnail) }}" alt="product"></td>
                                <td class="table-name">
                                    <h6><a href="{{ route('product.details',['id' => $product->id, 'slug' => $product->product_slug_en]) }}">{{ $product->product_name }}</a></h6>
                                </td>
                                <td class="table-desc">
                                    <p>${{ $product->discount_price }}</p>
                                </td>
                                <td class="table-price">
                                    <h6>${{ $product->selling_price }}</small></h6>
                                </td>
                               
                                <td class="table-shop">
                                <button class="btn-upper btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#product-view" onclick="productView(this.id)"
                                    id="{{ $product->id }}">Add to cart</button>
                                    <div class="product-action">
                                        <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                        <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                        <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                    </div>
                                </td>
                                <td class="table-action">
                                    <a class="view" href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#product-view11"><i class="fas fa-eye"></i></a>

                                    <button type="button" class="" onclick="removeWishlist(this.id)" id={{ $wish->id }}><i class="icofont-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="product-view">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
            <div class="product-view">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="view-gallery">
                            <div class="view-label-group">
                                <label class="view-label new">new</label>
                                <label class="view-label off">-10%</label>
                            </div>
                            <ul class="preview-slider slider-arrow"> 
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                            </ul>
                            <ul class="thumb-slider">
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                                <li><img src="images/product/01.jpg" alt="product"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="view-details">
                            <h3 class="view-name">
                                <a href="product-video.html">existing product name</a>
                            </h3>
                            <div class="view-meta">
                                <p>SKU:<span>1234567</span></p>
                                <p>BRAND:<a href="#">radhuni</a></p>
                            </div>
                            <div class="view-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href="product-video.html">(3 reviews)</a>
                            </div>
                            <h3 class="view-price">
                                <del>$38.00</del>
                                <span>$24.00<small>/per kilo</small></span>
                            </h3>
                            <p class="view-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit non tempora magni repudiandae sint suscipit tempore quis maxime explicabo veniam eos reprehenderit fuga</p>
                            <div class="view-list-group">
                                <label class="view-list-title">tags:</label>
                                <ul class="view-tag-list">
                                    <li><a href="#">organic</a></li>
                                    <li><a href="#">vegetable</a></li>
                                    <li><a href="#">chilis</a></li>
                                </ul>
                            </div>
                            <div class="view-list-group">
                                <label class="view-list-title">Share:</label>
                                <ul class="view-share-list">
                                    <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                    <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                    <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                    <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                </ul>
                            </div>
                            <div class="view-add-group">
                                <button class="product-add" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>add to cart</span>
                                </button>
                                <div class="product-action">
                                    <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                </div>
                            </div>
                            <div class="view-action-group">
                                <a class="view-wish wish" href="#" title="Add Your Wishlist">
                                    <i class="icofont-heart"></i>
                                    <span>add to wish</span>
                                </a>
                                <a class="view-compare" href="compare.html" title="Compare This Item">
                                    <i class="fas fa-random"></i>
                                    <span>Compare This</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>
@endsection