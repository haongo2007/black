@extends('layouts.web.app', ['page' => __('Cart'), 'pageSlug' => 'cart'])

@section('content')
<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url({{asset('web')}}/img/examples/bg2.jpg); transform: translate3d(0px, 17.3333px, 0px);">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ml-auto mr-auto text-center">
				<h2 class="title">Shopping Page</h2>
			</div>
		</div>
	</div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="card card-plain">
            <div class="card-body">
                <h3 class="card-title">Shopping Cart</h3>
                <br>
                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Product</th>
                                <th class="th-description">Color</th>
                                <th class="th-description">Size</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Qty</th>
                                <th class="text-right">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <img src="{{ asset('web') }}/img/examples/product5.jpg" alt="...">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#jacket">Spring Jacket</a>
                                    <br>
                                    <small>by Dolce&amp;Gabbana</small>
                                </td>
                                <td>
                                    Red
                                </td>
                                <td>
                                    M
                                </td>
                                <td class="td-number text-right">
                                    <small>€</small>549
                                </td>
                                <td class="td-number">
                                    1
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                        <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                    </div>
                                </td>
                                <td class="td-number">
                                    <small>€</small>549
                                </td>
                                <td class="td-actions">
                                    <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-link" data-original-title="Remove item">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <img src="{{ asset('web') }}/img/examples/product6.jpg" alt="...">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#pants">Short Pants</a>
                                    <br>
                                    <small>by Pucci</small>
                                </td>
                                <td>
                                    Purple
                                </td>
                                <td>
                                    M
                                </td>
                                <td class="td-number">
                                    <small>€</small>499
                                </td>
                                <td class="td-number">
                                    2
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                        <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                    </div>
                                </td>
                                <td class="td-number">
                                    <small>€</small>998
                                </td>
                                <td class="td-actions">
                                    <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-link" data-original-title="Remove item">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <img src="{{ asset('web') }}/img/examples/product7.jpg" alt="...">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#nothing">Pencil Skirt</a>
                                    <br>
                                    <small>by Valentino</small>
                                </td>
                                <td>
                                    White
                                </td>
                                <td>
                                    XL
                                </td>
                                <td class="td-number">
                                    <small>€</small>799
                                </td>
                                <td class="td-number">
                                    1
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                                        <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                                    </div>
                                </td>
                                <td class="td-number">
                                    <small>€</small>799
                                </td>
                                <td class="td-actions">
                                    <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-link" data-original-title="Remove item">
                                        <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="td-total">
                                    Total
                                </td>
                                <td colspan="1" class="td-price">
                                    <small>€</small>2,346
                                </td>
                                <td colspan="1"></td>
                                <td colspan="2" class="text-right">
                                    <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                                </td>
                            </tr>
                            <!-- <tr>
                <td colspan="6"></td>
                <td colspan="2" class="text-right">
                  <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                </td>
              </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop