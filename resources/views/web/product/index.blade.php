@extends('layouts.web.app', ['page' => __('Product'), 'pageSlug' => 'product'])

@section('content')
<div class="page-header header-filter" data-parallax="true" filter-color="rose" style="background-image: url({{ asset('web') }}/img/bg6.jpg); transform: translate3d(0px, 0px, 0px);">
  <div class="container">
    <div class="row title-row">
      <div class="col-md-4 ml-auto">
        <button class="btn btn-white float-right"><i class="material-icons">shopping_cart</i> 0 Items</button>
      </div>
    </div>
  </div>
</div>
<div class="section">
    <div class="container">
        <div class="main main-raised main-product">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-page1">
                            <img src="{{ asset('web') }}/img/examples/product1.jpg">
                        </div>
                        <div class="tab-pane" id="product-page2">
                            <img src="{{ asset('web') }}/img/examples/product2.jpg">
                        </div>
                        <div class="tab-pane" id="product-page3">
                            <img src="{{ asset('web') }}/img/examples/product3.jpg">
                        </div>
                        <div class="tab-pane" id="product-page4">
                            <img src="{{ asset('web') }}/img/examples/product4.jpg">
                        </div>
                    </div>
                    <div class="nbs-flexisel-container">
                        <div class="nbs-flexisel-inner">
                            <ul class="nav flexi-nav nbs-flexisel-ul" data-tabs="tabs" id="flexiselDemo1">
                                <li class="nav-item nbs-flexisel-item">
                                    <a href="#product-page1" class="nav-link" data-toggle="tab">
                                        <img src="{{ asset('web') }}/img/examples/product1.jpg">
                                    </a>
                                </li>
                                <li class="nav-item nbs-flexisel-item">
                                    <a href="#product-page2" class="nav-link" data-toggle="tab">
                                        <img src="{{ asset('web') }}/img/examples/product2.jpg">
                                    </a>
                                </li>
                                <li class="nav-item nbs-flexisel-item">
                                    <a href="#product-page3" class="nav-link" data-toggle="tab">
                                        <img src="{{ asset('web') }}/img/examples/product3.jpg">
                                    </a>
                                </li>
                                <li class="nav-item nbs-flexisel-item">
                                    <a href="#product-page4" class="nav-link" data-toggle="tab">
                                        <img src="{{ asset('web') }}/img/examples/product4.jpg">
                                    </a>
                                </li>
                            </ul>
                            <div id="navigation"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title"> Becky Silk Blazer </h2>
                    <h3 class="main-price">$335</h3>
                    <div id="accordion" role="tablist">
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Description
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Eres' daring 'Grigri Fortune' swimsuit has the fit and coverage of a bikini in a one-piece silhouette. This fuchsia style is crafted from the label's sculpting peau douce fabric and has flattering cutouts through the torso and back. Wear yours with mirrored sunglasses on vacation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Designer Information
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    An infusion of West Coast cool and New York attitude, Rebecca Minkoff is synonymous with It girl style. Minkoff burst on the fashion scene with her best-selling 'Morning After Bag' and later expanded her offering with the Rebecca Minkoff Collection - a range of luxe city staples with a "downtown romantic" theme.
                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Details and Care
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>Storm and midnight-blue stretch cotton-blend</li>
                                        <li>Notch lapels, functioning buttoned cuffs, two front flap pockets, single vent, internal pocket</li>
                                        <li>Two button fastening</li>
                                        <li>84% cotton, 14% nylon, 2% elastane</li>
                                        <li>Dry clean</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pick-size">
                        <div class="col-md-6 col-sm-6">
                            <label>Select color</label>
                            <div class="dropdown bootstrap-select">
                                <select class="selectpicker" data-style="select-with-transition" data-size="7" tabindex="-98">
                                    <option value="1">Rose </option>
                                    <option value="2">Gray</option>
                                    <option value="3">White</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>Select size</label>
                            <div class="dropdown bootstrap-select">
                                <select class="selectpicker" data-style="select-with-transition" data-size="7" tabindex="-98">
                                    <option value="1">Small </option>
                                    <option value="2">Medium</option>
                                    <option value="3">Large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row pull-right">
                        <button class="btn btn-rose btn-round">Add to Cart &nbsp;<i class="material-icons">shopping_cart</i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="features text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-info">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <h4 class="info-title">2 Days Delivery </h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-success">
                            <i class="material-icons">verified_user</i>
                        </div>
                        <h4 class="info-title">Refundable Policy</h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-rose">
                            <i class="material-icons">favorite</i>
                        </div>
                        <h4 class="info-title">Popular Item</h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products">
            <h3 class="title text-center">You may also be interested in:</h3>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card card-product">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img class="img" src="{{ asset('web') }}/img/examples/card-product1.jpg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;{{ asset('web') }}/img/examples/card-product1.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-rose">Trending</h6>
                            <h4 class="card-title">
                  <a href="#pablo">Dolce &amp; Gabbana</a>
                </h4>
                            <div class="card-description">
                                Dolce &amp; Gabbana's 'Greta' tote has been crafted in Italy from hard-wearing red textured-leather.
                            </div>
                        </div>
                        <div class="card-footer justify-content-between">
                            <div class="price">
                                <h4>$1,459</h4>
                            </div>
                            <div class="stats">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose" data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-product">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img class="img" src="{{ asset('web') }}/img/examples/card-product3.jpg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;{{ asset('web') }}/img/examples/card-product3.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-muted">Popular</h6>
                            <h4 class="card-title">
                  <a href="#pablo">Balmain</a>
                </h4>
                            <div class="card-description">
                                Balmain's mid-rise skinny jeans are cut with stretch to ensure they retain their second-skin fit but move comfortably.
                            </div>
                        </div>
                        <div class="card-footer justify-content-between">
                            <div class="price">
                                <h4>$459</h4>
                            </div>
                            <div class="stats">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link" data-original-title="Save to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-product">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img class="img" src="{{ asset('web') }}/img/examples/card-product4.jpg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;{{ asset('web') }}/img/examples/card-product4.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-muted">Popular</h6>
                            <h4 class="card-title">
                  <a href="#pablo">Balenciaga</a>
                </h4>
                            <div class="card-description">
                                Balenciaga's black textured-leather wallet is finished with the label's iconic 'Giant' studs. This is where you can...
                            </div>
                        </div>
                        <div class="card-footer justify-content-between">
                            <div class="price">
                                <h4>$590</h4>
                            </div>
                            <div class="stats">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose" data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-product">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img class="img" src="{{ asset('web') }}/img/examples/card-product2.jpg">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;{{ asset('web') }}/img/examples/card-product2.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-rose">Trending</h6>
                            <h4 class="card-title">
                  <a href="#pablo">Dolce &amp; Gabbana</a>
                </h4>
                            <div class="card-description">
                                Dolce &amp; Gabbana's 'Greta' tote has been crafted in Italy from hard-wearing red textured-leather.
                            </div>
                        </div>
                        <div class="card-footer justify-content-between">
                            <div class="price">
                                <h4>$1,459</h4>
                            </div>
                            <div class="stats">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-default" data-original-title="Save to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<script>
$(document).ready(function() {
  $("#flexiselDemo1").flexisel({
    visibleItems: 4,
    itemsToScroll: 1,
    animationSpeed: 400,
    enableResponsiveBreakpoints: true,
    navigationTargetSelector:'#navigation',
    responsiveBreakpoints: {
      portrait: {
        changePoint: 480,
        visibleItems: 3
      },
      landscape: {
        changePoint: 640,
        visibleItems: 3
      },
      tablet: {
        changePoint: 768,
        visibleItems: 3
      }
    }
  });
});
</script>
@endpush