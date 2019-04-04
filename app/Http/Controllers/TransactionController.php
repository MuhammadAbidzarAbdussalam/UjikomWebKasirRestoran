<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Session;

class TransactionController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
        return view('transaction.index')->withTransactions($transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $transaction = Transaction::find($id);
        return view('transaction.edit')->withTransaction($transaction);
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
        $this->validate($request, array(
                'order_id' => 'required',
                'total_payment' => 'required',
                'payment' => 'required',
                'return_payment' => 'required'
            ));

        $transaction = Transaction::find($id);

        $transaction->order_id = $request->input('order_id');
        $transaction->total_payment = $request->input('total_payment');
        $transaction->payment = $request->input('payment');
        $transaction->return_payment = $request->input('return_payment');
        $transaction->status = 1;

        $transaction->save();

        Session::flash('success', 'The Transaction was successfully paid!');

        return redirect()->route('transaction.index');
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
