<?php

namespace App\Http\Controllers\pettycash_payment;

use App\Account;
use App\PettyCash;
use App\PettyCashPayment;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller;

class PettyCashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pettycash_data=PettyCashPayment::with('pettycash')->with('pettycash_account')->get();
        return view('vendor.voyager.petty_cash_payment.browse',compact('pettycash_data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts=Account::with('account_category')->get();
        $petty_cash=PettyCash::all();
        return view('vendor.voyager.petty_cash_payment.create',compact('petty_cash','accounts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PettyCashPayment::create($request->all());
        return redirect('admin/petty-cash-payments')->with(['message' => "Petty Cash Payment Added Successfully", 'alert-type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounts=Account::all();
        $petty_cash=PettyCash::all();
        $pettycash_data=PettyCashPayment::with('pettycash')->find($id);
        return view('vendor.voyager.petty_cash_payment.read',compact('pettycash_data','accounts','petty_cash'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts=Account::all();
        $petty_cash=PettyCash::all();
        $pettycash_data=PettyCashPayment::with('pettycash')->find($id);
        return view('vendor.voyager.petty_cash_payment.edit',compact('pettycash_data','accounts','petty_cash'));

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

        $pettycash_data=PettyCashPayment::find($id);
        $pettycash_data->pettycash_id=$request->pettycash_id;
        $pettycash_data->account_id=$request->account_id;
        $pettycash_data->amount=$request->amount;
        $pettycash_data->save();
        return redirect('admin/petty-cash-payments')->with(['message' => "Petty Cash Payment Updated Successfully", 'alert-type' => 'info']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        PettyCashPayment::find($request->deleteid)->delete();
        return redirect('admin/petty-cash-payments')->with(['message' => "Petty Cash Payment Deleted Successfully", 'alert-type' => 'error']);

    }
}
