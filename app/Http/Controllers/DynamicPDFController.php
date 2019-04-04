<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transaction;
use PDF;

class DynamicPDFController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
     $transaction_data = Transaction::all();
     return view('dynamic_pdf')->with('transaction_data', $transaction_data);
    }

    public function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $transaction_data = Transaction::all();
     $output = '
     <h3 align="center">Order and Transaction Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
      	<th style="border: 1px solid; padding:12px;" width="10%">Order ID</th>
		    <th style="border: 1px solid; padding:12px;" width="15%">Costumer</th>
		    <th style="border: 1px solid; padding:12px;" width="15%">Menu</th>
		    <th style="border: 1px solid; padding:12px;" width="15%">Total Menu</th>
		    <th style="border: 1px solid; padding:12px;" width="15%">Total Payment</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Payment</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Return Payment</th>
		    <th style="border: 1px solid; padding:12px;" width="15%">Order Made By</th>
        <th style="border: 1px solid; padding:12px;" width="10%">Status</th>
   		</tr>
     ';  
     foreach($transaction_data as $transaction)
     {
      $output .= '
      <tr>
      		<td style="border: 1px solid; padding:12px;">'.$transaction->order->id.'</td>
	      	<td style="border: 1px solid; padding:12px;">'.$transaction->order->costumer->name.'</td>
	       	<td style="border: 1px solid; padding:12px;">'.$transaction->order->menu->menu.'</td>
	       	<td style="border: 1px solid; padding:12px;">'.$transaction->order->total.'</td>
	       	<td style="border: 1px solid; padding:12px;">'.$transaction->total_payment.'</td>
          <td style="border: 1px solid; padding:12px;">'.$transaction->payment.'</td>
          <td style="border: 1px solid; padding:12px;">'.$transaction->return_payment.'</td>
	       	<td style="border: 1px solid; padding:12px;">'.$transaction->order->user->name.'</td>
          <td style="border: 1px solid; padding:12px;">'.$transaction->status.'</td>
      </tr>
      ';
     }

     $output .= '</table>';
     return $output;

    }


}
