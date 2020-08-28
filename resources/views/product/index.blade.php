@extends('product.layout')

@section('contant')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull_left">
			<h2>Laravel Poduct List</h2>
		</div>
		<div class="float-right">
			<a class ="btn btn-success" href="{{route('create.product')}}">Create new Product</a>
		</div>
	</div>
</div>


	@if($msg = Session::get('success'))

	<div class="alert-success alert">
		<p>{{$msg}}</p>
	</div>

	@endif 

	<table class ="table table-bordered">
		<tr>
			<th>Product Name</th>
			<th>Product Code</th>
			<th>Product Details</th>
			<th>Product Logo</th>
			<th>Action</th>
		</tr>

         @foreach($product as $pro)
		<tr>
			<td width="50px">{{$pro->product_name}}</td>
			<td width="20px">{{$pro->product_code}}</td>
			<td width="100px" height="100px">{{$pro->details}}</td>
			<td width="40px" height="40px"><img src="{{URL::to($pro->logo)}}" width="70px" height="60px"></td>
			<td width="150px">
				<a href="{{URL::to('show/product/'.$pro->id)}}" class="btn btn-info">Show</a>
				<a href="{{URL::to('edit/product/'.$pro->id)}}" class="btn btn-primary">Edit</a>
				<a href="{{URL::to('delete/product/'.$pro->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	{!! $product->links() !!} 


@endsection