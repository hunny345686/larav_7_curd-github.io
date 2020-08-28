<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
   public function index(){
   	$product = DB::table('products')->latest()->paginate(2);
   	return view('product.index',compact('product'));
   }


   public function create()
   {
   	return view('product.create');
   }


   public function store(Request $req)
   {

   	$data = array();
   	$data['product_name']= $req->product_name;
   	$data['product_code']= $req->product_code;
   	$data['details']= $req->details;
   	$img = $req->file('logo');
   	if ($img) {
   		$img_name = date('dmy_h_s_i');
   		$ext = strtolower($img->getClientOriginalExtension());
   		$img_full_name = $img_name.'.'.$ext;
   		$upload_path= 'public/media/';
   		$img_url= $upload_path.$img_full_name;
   		$suc = $img->move($upload_path,$img_full_name);

   		$data['logo']=$img_url;

   		$product = DB::table('products')->insert($data);
   		return redirect()->route('product.index')->with('success','Product created');

   	}

   }

   public function edit($id){

   	$product = DB::table('products')->where('id',$id)->first();
   	return view('product.edit',compact('product'));

   }


   public function update(Request $req, $id){

   	   $old_logo = $req->old_logo;

	   	$data = array();
	   	$data['product_name']= $req->product_name;
	   	$data['product_code']= $req->product_code;
	   	$data['details']= $req->details;
	   	$img = $req->file('logo');
	   	if ($img) {
	   		unlink($old_logo);
	   		$img_name = date('dmy_h_s_i');
	   		$ext = strtolower($img->getClientOriginalExtension());
	   		$img_full_name = $img_name.'.'.$ext;
	   		$upload_path= 'public/media/';
	   		$img_url= $upload_path.$img_full_name;
	   		$suc = $img->move($upload_path,$img_full_name);

	   		$data['logo']=$img_url;

	   		$product = DB::table('products')->where('id',$id)->update($data);
	   		return redirect()->route('product.index')->with('success','Product Updated');

	   	}

   }


   public function delete($id){
   	  $data = DB::table('products')->where('id',$id)->first();
   	  $img = $data->logo;
   	  unlink($img);
   	  $product =DB::table('products')->where('id',$id)->delete();
   	  return redirect()->route('product.index')->with('success','Product Deleted');

   }


   public function show($id){

   	$data = DB::table('products')->where('id',$id)->first();

   	return view('product.show',compact('data'));
   }
}
