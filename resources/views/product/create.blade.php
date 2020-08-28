@extends('product.layout')

@section('contant')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull_left">
			<h2>Add New Product</h2>
		</div>
		<div class="float-right">
			<a class ="btn btn-success" href="{{route('product.index')}}">back</a>
		</div>
	</div>
</div>


<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
 @csrf
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Product Name</strong>
				<input type="text" name="product_name" class="form-control" placeholder="Product Name">
			</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Product Code</strong>
				<input type="text" name="product_code" class="form-control" placeholder="Product Code">
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Product Detail</strong>
				<textarea name="details" class="form-control"></textarea>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Product Image</strong>
				<input type="file" name="logo" class="form-control">
				
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
	
</form>

@endsection