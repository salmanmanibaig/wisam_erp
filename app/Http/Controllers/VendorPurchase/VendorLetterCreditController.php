<?php

namespace App\Http\Controllers\VendorPurchase;

use App\StockManagment;
use App\Unit;
use App\VendorBlNumber;
use App\VendorLetterCredit;
use App\VendorPurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function Sodium\add;

class VendorLetterCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users=Customer::all();
//        dd($users);
        $letter_credit = VendorLetterCredit::all();
        VendorLetterCredit::check_gdnumber($letter_credit);
//        dd($letter_credit);
        return view('vendor.voyager.vendor-letter-credits.browse',compact('letter_credit'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {


        $purchase_order= VendorPurchaseOrder::where('status',0)->where('id',$id)->first();
        $return_po=VendorPurchaseOrder::where('po_type','loan')
            ->where('status',1)
            ->doesntHave('return_lc')
            ->get();

        return view('vendor.voyager.vendor-letter-credits.create',compact('purchase_order','return_po'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $validatedData = $request->validate([
            'lc_number' => ['required', 'unique:vendor_letter_credits', 'max:255'],
            'bl_number' => ['required', 'array'],


        ]);
        $input =  $request->all();
        $rules = [];

        foreach($input['bl_number'] as $key => $val)
        {
            $rules['bl_number.'.$key] = 'required|distinct|min:3';
        }



        $validator = Validator::make($input, $rules);

//Now check validation:
        if ($validator->fails())
        {
           dd(2);
        }

        DB::beginTransaction();


        try {



            $lc= new VendorLetterCredit();

            $lc->po_id=$request->po_id;
            $lc->lc_number=$request->lc_number;
            $lc->return_po_id=$request->return_po;
            $lc->lc_qty=$request->lc_qty;
            $lc->save();



//        dd($request->contact_id);

            foreach ($request->bl_number as $key=> $bl_number)
            {
                $detail= new  VendorBlNumber();
                $detail->bl_number = $bl_number;
                $detail->bl_qty = $request->qty[$key];
                $detail->lc_id = $lc->id;
                $detail->save();

            }


            DB::commit();

        }catch (\Exception $e)
        {

            DB::rollBack();

            return redirect()->back()->with(['message'=>'Bl number Already Taken','alert-type'=>'danger']);;
        }




        return  redirect('admin/vendor-purchase-orders/view_detail/'.$request->po_id);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $letter_credit=VendorLetterCredit::find($id);

        $purchase_order= VendorPurchaseOrder::where('status',0)->get();



        return view('vendor.voyager.vendor-letter-credits.read',compact('letter_credit','purchase_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $letter_credit=VendorLetterCredit::find($id);

        $purchase_order= VendorPurchaseOrder::where('po_type','international')->where('status',0)->get();
        $return_po=VendorPurchaseOrder::where('po_type','loan')->where('status',1)->get();

//            dd($return_po);

        return view('vendor.voyager.vendor-letter-credits.edit',compact('letter_credit','purchase_order','return_po'));
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


        $lc= VendorLetterCredit::with('vendorpo')->find($id);



        $lc->lc_number=$request->lc_number;
        $lc->lc_qty=$request->lc_qty;

        $lc->save();

        $arr=array();
        foreach ($request->bl_id as $key=> $id)
        {

            $detail= VendorBlNumber::find($request->bl_id[$key]);
            if(!$detail)
            {
                $detail= new  VendorBlNumber();
            }

            $detail->bl_number = $request->bl_number[$key];
            $detail->gd_number = $request->gd_number[$key];
            $detail->bl_qty = $request->qty[$key];
            $detail->lc_id = $lc->id;


            $detail->save();

            $arr[$key]=$detail->id;
            if($detail->gd_number != null)
            {
                $this->add_stock($lc,$detail);

            }

        }


        VendorBlNumber::whereNotIn('id', $arr)->delete();



        return  redirect('admin/vendor-purchase-orders/view_detail/'.$lc->po_id);
    }

    function add_stock($lc,$detail)
    {
        $stock = StockManagment::where('bl_id',$detail->id)->first();
        if(!$stock)
        {
            $stock=  new StockManagment();
        }

        $stock->warehouse_id=1;


        $stock->company_id=$lc->vendorpo->company_id;

        $unit=Unit::find($lc->vendorpo->unit_id);
        $stock->stock_in=$detail->bl_qty*$unit->qty;
        $stock->stock_type="purchase";
        $stock->po_id=$lc->vendorpo->id;
        $stock->product_id=$lc->vendorpo->product_id;
        $stock->po_number=$lc->vendorpo->po_number;
        $stock->lc_id=$lc->id;
        $stock->bl_id=$detail->id;
        $stock->import_type=$lc->vendorpo->po_type;
        $stock->save();
    }

    public function deleteInUpdate($id){

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id=$request->deleteid;

//        dd($id);
        VendorLetterCredit::find($id)->delete();
        VendorBlNumber::where('lc_id','=',$id)->delete();
        StockManagment::where('lc_id',$id)->delete();
        return redirect('admin/vendor-letter-credits')->with('info','Record Deleted Successfully');
    }


}
