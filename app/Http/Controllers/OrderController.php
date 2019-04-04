<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Costumer;
use App\Menu;
use App\User;
use App\Transaction;
use Session;

class OrderController extends Controller
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
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('order.index')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumers = Costumer::all();
        $menus = Menu::all();
        $users = User::all();
        return view('order.create')->withCostumers($costumers)->withMenus($menus)->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'costumer_id' => 'required',
                'menu_id' => 'required',
                'total' => 'required',
                'user_id' => 'required',
                'total_payment' => 'required'
            ));

        // store in the database
        $order = new Order;

        $order->costumer_id = $request->costumer_id;
        $order->menu_id = $request->menu_id;
        $order->total = $request->total;
        $order->user_id = $request->user_id;

        $order->save();

        $transaction = new Transaction;
        $order_id = $order->id;

        $transaction->order_id = $order_id;
        $transaction->total_payment = $request->total_payment;
        $transaction->payment = '0';
        $transaction->return_payment = '0';
        $transaction->status = '0';

        $transaction->save();

        Session::flash('success', 'The Order was successfully save!');

        // redirect to another page
        return redirect()->route('order.index');
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
        $costumers = Costumer::all();
        $costs = array();
        foreach ($costumers as $costumer) {
            $costs[$costumer->id] = $costumer->name;
        }

        $menus = Menu::all();
        $mens = array();
        foreach ($menus as $menu) {
            $mens[$menu->id] = $menu->menu;
        }

        $users = User::all();
        $uses = array();
        foreach ($users as $user) {
            $uses[$user->id] = $user->name;
        }

        $order = Order::find($id);

        return view('order.edit')->withOrder($order)->withCostumers($costs)->withMenus($mens)->withUsers($uses);
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
                'costumer_id' => 'required',
                'menu_id' => 'required',
                'total' => 'required',
                'user_id' => 'required'
            ));

        $order = Order::find($id);

        $order->costumer_id = $request->input('costumer_id');
        $order->menu_id = $request->input('menu_id');
        $order->total = $request->input('total');
        $order->user_id = $request->input('user_id');

        $order->save();

        Session::flash('success', 'The Costumer was successfully changed!');

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        Session::flash('success', 'The Order was successfully deleted.');

        return redirect()->route('order.index');
    }
}
