@extends('product.layout')

@section('contant')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull_left">
			<h2>Show Product</h2>
		</div>
		<div class="float-right">
			<a class ="btn btn-success" href="{{route('product.index')}}">back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="from-group">
			<strong>Product Name</strong>
			{{$data->product_name}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="from-group">
			<strong>Product Code</strong>
			{{$data->product_code}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="from-group">
			<strong>Product detail</strong>
			{{$data->details}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="from-group">
			<strong>Product Image</strong>
			<img src="{{URL::to($data->logo)}}" alt="abc" height="150px" width="200px">
		</div>
	</div>


</div>



@endsection