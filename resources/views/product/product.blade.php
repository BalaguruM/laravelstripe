@extends('layouts.app')
@section('content')
<body>
<!-- partial:index.partial.html -->
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-8 col-lg-6">
				<div class="header">
						<h2>{{__('Products List') }}</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Single Product -->
			@foreach($data as $productDel)
			<div class="col-md-6 col-lg-4 col-xl-3">
			<input type ="hidden" name="product_name" value="{{ $productDel->name }}" >
				<div id="product-1" class="single-product">
					<div class="part-1">
						<img height="100%" width="100%" src="{{ $productDel->images }}" alt="image">
					</div>
					<div class="part-2">
							<h3 class="product-title">{{ $productDel->name }}</h3>
							<h4 class="product-price">₹ {{ $productDel->price }}</h4>
							<button><a href="{{ route('stripe', [$productDel->price ,$productDel->name]) }}" >Buy Now</a></button>
					</div>						
				</div>			
			</div>
			@endforeach
		</div>
	</div> 
</body>
@endsection