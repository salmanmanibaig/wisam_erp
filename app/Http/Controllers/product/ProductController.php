<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_data=Product::with('product_images')->get();
        return $product_data;

//        return view('product.browse',compact('product_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.voyager.product1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        if ($request->hasFile('product_image')) {
//        return $request->all();

            foreach ((array)$request->product_name as $key => $name) {


                $Product = new Product();

                $Product->product_name = $name;
                $Product->product_pric = $request->product_price[$key];
                $Product->product_qty = $request->product_qty[$key];
                $Product->product_description = $request->product_description[$key];
//            $Product->product_image=$new_name[$key];
                $Product->save();


                foreach ((array)$request->product_image as $key1 => $image) {
                    $img=$request->product_image;

                    $new_name = date('YmdHis') . "." . $img->getClientOriginalName();
                    $img->move(public_path('images/product_image'), $new_name);
                    $ProductImage = new ProductImage();
                    $ProductImage->product_id = $Product->id;
                    $ProductImage->image = $new_name;
//                    dd($ProductImage);
//                    return $new_name;
                    $ProductImage->save();
                }

            }



//            dd($ProductImage);
            return 'data save successfully';
        }
        else{
            return 'data not save successfully';
        }
        return redirect('admin/products')->with(['message' => "Data is Inserted Successfully", 'alert-type' => 'success']);

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_data=Product::with('product_images')->find($id);
        return $product_data;
        return view('vendor.voyager.product1.read',compact('product_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_data=Product::with('product_images')->find($id);
        return $product_data;

        return view('vendor.voyager.product1.edit',compact('product_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
$arr=array();
$i=0;

//dd($request->product_id,$request->all(),$id);
            foreach ($request->product_name as $key => $name) {


                $Product = Product::with('product_images')->find($request->product_id);


                $Product->product_name = $name;
                $Product->product_pric = $request->product_price[$key];
                $Product->product_qty = $request->product_qty[$key];
                $Product->product_description = $request->product_description[$key];
//            $Product->product_image=$new_name[$key];
                $Product->save();
                if ($request->hasFile('product_image')) {
                    foreach ($request->product_image as $key1 => $image) {

                        $new_name = date('YmdHis') . "." . $image->getClientOriginalName();
                        $image->move(public_path('images/product_image'), $new_name);
                        $ProductImage =  ProductImage::find($request->product_id);
                        dd($ProductImage);
//                        dd('there is error in inserteing imgae');
                        $ProductImage->product_id = $Product->id;
                        $ProductImage->image = $new_name;
//                    dd($ProductImage);
                        $ProductImage->save();
                        $arr[$i]=$ProductImage->id;
                        $i++;
                    }
                }else
                {
                }

            }


        ProductImage::where('product_id',$Product->product_id)->whereNotIn('id',$arr)->delete();

//            dd($ProductImage);
        return 'data is updated';

        return redirect('admin/products')->with(['message' => "Data is Updated Successfully", 'alert-type' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        ProductImage::where('product_id',$id)->delete();
        return 'data is deleted';
        return redirect('admin/products')->with(['message' => "Data is Deleted Successfully", 'alert-type' => 'error']);

    }
}
