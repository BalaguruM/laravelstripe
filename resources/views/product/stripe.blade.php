@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		
		@if (Session::has('success'))
			<div class="alert alert-success text-center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				<p>{{ Session::get('success') }}</p>
			</div>
		@endif
			
            <div class="card">
                <div class="card-header">{{__('Laravel Stripe Payment Integration')}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<form role="form" action="{{ route('stripe-charge') }}" method="post" class="require-validation" data-cc-on-file="false"
							data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="subscribe-form">
						@csrf
						<input type="hidden" name="productname" value="{{$productname}}" />
						<input type="hidden" name="amount" value="{{$amount}}" />
						<div class='form-row row'>
							<div class='col-md-12 form-group required'>
								<label class='control-label'>Card Holder Name</label> <input
									class='form-control'  id="card-holder-name" size='4' type='text'>
							</div>
						</div>
						<div class="row">
							<label for="card-element">Credit or debit card</label>
							<div id="card-element" class="form-control">
							</div>
							<!-- Used to display form errors. -->
							<div id="card-errors" role="alert"></div>

							<div class="stripe-errors"></div>
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								{{ $error }}<br>
								@endforeach
							</div>
							@endif
						</div><br>
						<div class="row">
							<div class="col-md-3 form-group">
								<button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">Pay Now ₹ ({{$amount}})</button>
							</div>
							<div class="col-md-6 form-group">
								<a  class="btn btn-lg btn-success btn-block" href="{{route('product')}}" >Back </a>
							</div>
						</div>  
						<div class="row">
							
						</div>  
                    </form>				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection