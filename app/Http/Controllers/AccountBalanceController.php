<?php

namespace App\Http\Controllers;

use App\Account;
use App\EmployeeSalary;
use App\EmployeeSalaryDetail;
use App\PaymentTrans;
use App\PettyCashPayment;
use Illuminate\Http\Request;

class AccountBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credit=array();
        $debit=array();
        $balance=array();
        $accounts=Account::all();

        foreach ($accounts as $acc)
        {
            $acc->credit_acc=   PaymentTrans::where('account_id',$acc->id)->where('transaction_type','credit')->sum('amount');
            $debit= PaymentTrans::where('account_id',$acc->id)->where('transaction_type','debit')->sum('amount');
            $debit= $debit+ PettyCashPayment::where('account_id',$acc->id)->sum('amount');
            $debit= $debit+ EmployeeSalaryDetail::whereHas('salary',function ($query) use ($acc){
                $query->where('account_id',$acc->id);
            })->get()->sum('paid_salary');
//                dd($debits,$acc);

            $acc->acc_existCheck= PaymentTrans::where('account_id',$acc->id)->where('object_type','customer')->where('third_party_payment_type','check')->where('exist_check',0)->get();

            $acc->existCheck=count($acc->acc_existCheck);
            $acc->clearing_amount= $acc->acc_existCheck->sum('amount');

            $acc->balance=$acc->credit_acc - $debit;



        }

//dd($credit,$debit,$balance);

        return view('vendor.voyager.account_balance.browse',compact('accounts','balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
