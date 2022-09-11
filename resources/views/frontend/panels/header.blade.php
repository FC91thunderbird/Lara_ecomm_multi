
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user"><img src="{{ asset('frontend/images/user.png') }}" alt="user11"></button>
                <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo11"></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>

            <a href="/" class="header-logo">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </a>
            <form class="header-form">
                <input type="text" placeholder="Search anything...">
                <button><i class="fas fa-search"></i></button>
            </form>

            <div class="header-widget-group">
                <a href="compare.html" class="header-widget" title="Compare List">
                    <i class="fas fa-random"></i>
                    <sup>0</sup>
                </a>
                <a href="wishlist.html" class="header-widget" title="Wishlist">
                    <i class="fas fa-heart"></i>
                    <sup id="wishTotal"></sup>
                </a>
                <button class="header-widget header-cart" title="Cartlist">
                    <i class="fas fa-shopping-basket"></i>
                    <sup id="cartQty"></sup>
                    <span>total price<small><span id="cartSubTotal"></span></small></span>
                </button>

                @guest
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="header-widget" title="Wishlist">Login / Register</a>
                    @endif
                @else
                    <a href="#" class="header-widget" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('frontend/images/user.png') }}" alt="user">
                        <span> {{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    
                @endguest
                
            </div>
        </div>
    </div>
</header>


<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                    <li class="navbar-item">
                        <a class="navbar-link" href="#">Home</a>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link" href="#">Shop</a>
                    </li>
                        
                     
                    </ul>
                    <div class="navbar-info-group">
                        <div class="navbar-info">
                            <i class="icofont-ui-touch-phone"></i>
                            <p>
                                <small>call us</small>
                                <span>(+880) 183 8288 389</span>
                            </p>
                        </div>
                        <div class="navbar-info">
                            <i class="icofont-ui-email"></i>
                            <p>
                                <small>email us</small>
                                <span>support@greeny.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--=====================================
            NAVBAR PART END
=======================================-->



<!--=====================================
        CATEGORY SIDEBAR PART START
=======================================-->
<aside class="category-sidebar">
    <div class="category-header">
        <h4 class="category-title">
            <i class="fas fa-align-left"></i>
            <span>categories</span>
        </h4>
        <button class="category-close"><i class="icofont-close"></i></button>
    </div>
    <ul class="category-list">
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-vegetable"></i>
                <span>vegetables</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">asparagus</a></li>
                <li><a href="#">broccoli</a></li>
                <li><a href="#">carrot</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-groceries"></i>
                <span>groceries</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Grains & Bread</a></li>
                <li><a href="#">Dairy & Eggs</a></li>
                <li><a href="#">Oil & Fat</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fruit"></i>
                <span>fruits</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Apple</a></li>
                <li><a href="#">Orange</a></li>
                <li><a href="#">Strawberry</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-dairy-products"></i>
                <span>dairy farm</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Egg</a></li>
                <li><a href="#">milk</a></li>
                <li><a href="#">butter</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-crab"></i>
                <span>sea foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Lobster</a></li>
                <li><a href="#">Octopus</a></li>
                <li><a href="#">Shrimp</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-salad"></i>
                <span>diet foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Salmon</a></li>
                <li><a href="#">Potatoes</a></li>
                <li><a href="#">Greens</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-dried-fruit"></i>
                <span>dry foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">noodles</a></li>
                <li><a href="#">Powdered milk</a></li>
                <li><a href="#">nut & yeast</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fast-food"></i>
                <span>fast foods</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">mango</a></li>
                <li><a href="#">plumsor</a></li>
                <li><a href="#">raisins</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-cheers"></i>
                <span>drinks</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Wine</a></li>
                <li><a href="#">Juice</a></li>
                <li><a href="#">Water</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-beverage"></i>
                <span>coffee</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Cappuchino</a></li>
                <li><a href="#">Espresso</a></li>
                <li><a href="#">Latte</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-barbecue"></i>
                <span>meats</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Meatball</a></li>
                <li><a href="#">Sausage</a></li>
                <li><a href="#">Poultry</a></li>
            </ul>
        </li>
        <li class="category-item">
            <a class="category-link dropdown-link" href="#">
                <i class="flaticon-fish"></i>
                <span>fishes</span>
            </a>
            <ul class="dropdown-list">
                <li><a href="#">Agujjim</a></li>
                <li><a href="#">saltfish</a></li>
                <li><a href="#">pazza</a></li>
            </ul>
        </li>
    </ul>
    <div class="category-footer">
        <p>All Rights Reserved by <a href="#">Mironcoder</a></p>
    </div>
</aside>
<!--=====================================
        CATEGORY SIDEBAR PART END
=======================================-->


<!--=====================================
            CART SIDEBAR PART START
=======================================-->
<aside class="cart-sidebar">
    <div class="cart-header">
        <div class="cart-total">
            <i class="fas fa-shopping-basket"></i>
            <span>total item (<span id="cartQty"></span>)</span>
        </div>
        <button class="cart-close"><i class="icofont-close"></i></button>
    </div>
    <ul class="cart-list" id="miniCart">
       
       
    </ul>
    <div class="cart-footer">
        <button class="coupon-btn">Do you have a coupon code?</button>
        <form class="coupon-form">
            <input type="text" placeholder="Enter your coupon code">
            <button type="submit"><span>apply</span></button>
        </form>
        <a class="cart-checkout-btn" href="checkout.html">
            <span class="checkout-label">Proceed to Checkout</span>
            <span class="checkout-price" id="cartSubTotal"></span>
        </a>
    </div>
</aside>



<!--=====================================
            MOBILE-MENU PART START
=======================================-->
<div class="mobile-menu">
    <a href="index.html" title="Home Page">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <button class="cate-btn" title="Category List">
        <i class="fas fa-list"></i>
        <span>category</span>
    </button>
    <button class="cart-btn" title="Cartlist">
        <i class="fas fa-shopping-basket"></i>
        <span>cartlist</span>
        <sup>9+</sup>
    </button>
    <a href="wishlist.html" title="Wishlist">
        <i class="fas fa-heart"></i>
        <span>wishlist</span>
        <sup>0</sup>
    </a>
    <a href="compare.html" title="Compare List">
        <i class="fas fa-random"></i>
        <span>compare</span>
        <sup>0</sup>
    </a>
</div>
<!--=====================================
            MOBILE-MENU PART END
=======================================-->


<!--=====================================
            PRODUCT VIEW START
=======================================-->
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
                            </ul>
                            <ul class="thumb-slider">
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
<!--=====================================
            PRODUCT VIEW END
=======================================-->