@extends('adminlte::page')

@section('content_header')

<div class="content-header" style="margin-top: 0px">
  <h1>
    Generate Report
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Generate Report</a></li>
    <li class="active">Generate Preview</li>
  </ol>
</div>

@if (Session::has('success'))

<div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong><i class="icon fa fa-check"></i> Success! </strong> {{ Session::get('success') }}
</div>

@endif

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert" style="margin-top: 20px">
  <strong>Errors:</strong>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>

@endif
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box">

      <div class="box-header with-border">
        <h3 class="box-title">All Order</h3>

        <div class="box-tools">
          <div class="col-md-12">
           <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger btn-sm">Convert into PDF</a>
         </div>
       </div>

     </div>

     <div class="box-body">
      <table class="table table-bordered">
        <thead>
          <th style="width: 45px">Id</th>
          <th>Costumer</th>
          <th>Menus</th>
          <th style="width: 85px">Total Menu</th>
          <th>Prices</th>
          <th>Payment</th>
          <th>Return Payment</th>
          <th>Made By</th>
          <th>Status</th>
        </thead>

        <tbody>

          @foreach ($transaction_data as $transaction)
          <tr>
            <th>{{ $transaction->order->id }}</th>
            <td>{{ $transaction->order->costumer->name }}</td>
            <td>{{ $transaction->order->menu->menu }}</td>
            <td>{{ $transaction->order->total }}</td>
            <td>Rp. {{ $transaction->total_payment }}</td>
            <td>Rp. {{ $transaction->payment }}</td>
            <td>Rp. {{ $transaction->return_payment }}</td>
            <td>{{ $transaction->order->user->name }}</td>
            <td>
              @if ( $transaction->status == 0)
                <span class="label label-danger">Not Yet</a>
              @else
                <span class="label label-success">Success</a>
              @endif
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div class="pagination-sm no-margin pull-left">
      {{-- {!! $orders->appends(\Request::except('page'))->render() !!} --}}
    </div>

  </div>
</div>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection


