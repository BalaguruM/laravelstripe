@extends('layouts.app')
@section('content')
<div class="container">

 @if (Session::has('success'))
	<div class="alert alert-success text-center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<p>{{ Session::get('success') }}</p>
	</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
					  <div class="container-fluid">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						  <span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
						  <ul class="navbar-nav">
							<li class="nav-item">
							  <a class="nav-link active" aria-current="page" href="#">Home</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="{{ route('product') }}">Products</a>
							</li>
						  </ul>
						</div>
					  </div>
					</nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection