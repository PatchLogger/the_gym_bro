<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/public">
	@include('all_products.headerlinks')
</head>

<body class="">

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130" style="background-color: #1e1e1e;">
		<div class="container rounded-div" style="background-color: #2d2d30	;">
			@include('all_products.header')
			@if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                    </div>
                    @endif
			<!-- Modal1 -->
			
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" style="background-color: #2d2d30;">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="slick3 gallery-lb">
									<div class="item-slick3">
										<div class="wrap-pic-w pos-relative">
											<img src="products/{{$data->image}}" class="rounded-image" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1  fs-12 cl10  trans-04" href="products/{{$data->image}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl1 p-b-14">
								{{$data->title}}
							</h4>
							@if($data->discount_price)
							<span class="mtext-106 cl0">
								${{$data->discount_price}}
							</span>
							<br>
							<span class="mtext-100 cl4" style="text-decoration: line-through ;">
								${{$data->price}}
							</span>
							@else
							<span class="mtext-106 cl0">
								${{$data->price}}
							</span>
							@endif
							
							<p class="stext-102 cl3 p-t-23">
								{{$data->discription}}
							</p>
							<form action="{{url('add_cart',$data->id)}}" id="myForm" method="Post">
								@csrf
								<div class="p-t-33">
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-204 flex-w flex-m respon6-next">
											<div class="wrap-num-product m-l-8 flex-w m-r-20 m-tb-10">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input id="quantityInput" class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" min="1" value="1" readonly>

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										
											<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Add to cart
											</button>
										</div>
									</div>
								</div>
							</form>
							<!--  -->

						</div>
					</div>
				</div>
				<!-- Pagination -->


			</div>
	</section>
	<!-- Footer -->
	@include('all_products.footer')

	<!-- Back to top -->
	<div class="btn-back-to-top" id="	myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	@include('all_products.js')
	

</body>

</html>