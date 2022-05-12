<?php

namespace App\Http\Controllers\VendorManagement;

use App\CategoryName;
use App\Http\Controllers\Controller;
//use App\Models\VendorManagement\Vendor;
use App\Models\Supplier;
use App\Vendor;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::where('vendor_type','standard')->orderBy('id','desc')->get();
        return view('vendor.voyager.vendor.browse',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_name="CategoryName::all()";

        return view('vendor.voyager.vendor.create',compact('category_name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        if ($request->hasFile('attachment'))
        {
            $file = $request->file('attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/vendor_profile', $name);


        }
        else{}


       $vendor=new Vendor();
//        $vendor->vendor_category=json_encode( $request->category);
       $vendor->f_name=$request->f_name;
       $vendor->l_name=$request->l_name;
       $vendor->vendor_company=$request->vendor_company;
       $vendor->street=$request->street;
       $vendor->vendor_type=$request->vendor_type;
       $vendor->city=$request->city;
       $vendor->state=$request->state;
       $vendor->postal_name=$request->postal_name;
       $vendor->country=$request->country;
       $vendor->note=$request->note;
       $vendor->email=$request->email;
       $vendor->phone_no=$request->phone_no;
       $vendor->mobile_no=$request->mobile_no;
       $vendor->fax_no=$request->fax_no;
       $vendor->others=$request->others;
       $vendor->web_link=$request->web_link;
       $vendor->terms=$request->terms;
       $vendor->as_of=$request->as_of;
       $vendor->opening_balance=$request->opening_balance;
       $vendor->account_no=$request->account_no;
       $vendor->business_id=$request->business_id;

           $vendor->attachment=$name;


       $vendor->save();
//       return redirect()->back()->with(['message' => "Faisal task complete Successfully", 'alert-type' => 'success']);
       return redirect('admin/vendors')->with(['message' => "Added Successfully", 'alert-type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $vendor=Vendor::find($id);
       return view('vendor.voyager.vendor.read',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $category_name=CategoryName::all();
        $vendor=Vendor::find($id);
        return view('vendor.voyager.vendor.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('attachment'))
        {
            $file = $request->file('attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/vendor_profile', $name);


        }

        $vendor=Vendor::find($id);
//        $vendor->vendor_category=json_encode( $request->category);
        $vendor->name=$request->f_name.' '.$request->l_name;
        $vendor->f_name=$request->f_name;
        $vendor->l_name=$request->l_name;
        $vendor->vendor_company=$request->vendor_company;
        $vendor->street=$request->street;
        $vendor->city=$request->city;
        $vendor->state=$request->state;
        $vendor->postal_name=$request->postal_name;
        $vendor->country=$request->country;
        $vendor->note=$request->note;
        $vendor->email=$request->email;
        $vendor->phone_no=$request->phone_no;
        $vendor->mobile_no=$request->mobile_no;
        $vendor->fax_no=$request->fax_no;
        $vendor->others=$request->others;
        $vendor->web_link=$request->web_link;
        $vendor->terms=$request->terms;
        $vendor->as_of=$request->as_of;
        $vendor->opening_balance=$request->opening_balance;
        $vendor->account_no=$request->account_no;
        $vendor->business_id=$request->business_id;

//            $vendor->attachment=$name;



//        dd($vendor);

        $vendor->save();
//        dd($vendor);
        return redirect('admin/vendors')->with(['message' => "Updated Successfully", 'alert-type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=($request->deleteid);
        $vendor=Vendor::find($id)->delete();
        return redirect()->back()->with(['message' => "Deleted Successfully", 'alert-type' => 'error']);
    }
}
