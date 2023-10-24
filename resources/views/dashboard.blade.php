<!DOCTYPE html>
<html lang="en">

<head>
	@include('all_products.headerlinks')
</head>

<body class="" style="background-color: #1e1e1e;">

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130" style="background-color: #1e1e1e;">
		<div class="container rounded-div" style="background-color: #2d2d30	;">
			@include('all_products.header')
			@include('all_products.catfilter')

			<div class="row isotope-grid">
				@foreach($data as $data)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$data->catagory}} rounded-div">
					<!-- Block2 -->	
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="products/{{$data->image}}" class="rounded-image" alt="IMG-PRODUCT">

							<a href="{{url('product-detail',$data->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								View Details
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{url('product-detail',$data->id)}}" class="stext-104 hov-cl1 trans-04  cl1  p-b-14">
									{{$data->title}}
								</a>

								
								@if($data->discount_price)
								<span class="stext-106 cl0">
									${{$data->discount_price}}
								</span>
								<span class="stext-100 cl4" style="text-decoration: line-through ;">${{$data->price}}</span>
								@else
								<span class="stext-106 cl0">
									${{$data->price}}
								</span>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
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