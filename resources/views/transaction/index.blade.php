@extends('adminlte::page')

@section('content_header')

	<div class="content-header" style="margin-top: 0px">
      <h1>
        Transaction List
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('transaction.index') }}">Transaction</a></li>
        <li class="active">Transaction List</li>
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
              		<h3 class="box-title">All Transaction</h3>

              		<div class="box-tools">
              		
						<div class="col-md-8">
              				<div class="input-group input-group-sm" style="width: 150px;">
                  				<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  				<div class="input-group-btn">
                    				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  				</div>
                			</div>
              			</div>
					</div>

            	</div>

				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th style="width: 45px">Id</th>
							<th>Order ID</th>
							<th>Total Payment</th>
							<th>Payment</th>
							<th>Return Payment</th>
							<th>Status</th>
							<th style="width: 100px">Action</th>
						</thead>

						<tbody>
								
							@foreach ($transactions as $transaction)
								{!! Form::open(['route' => ['transaction.destroy', $transaction->id], 'method' => 'DELETE']) !!}
								<tr>
									<th>{{ $transaction->id }}</th>
									<td>{{ $transaction->order_id }}</td>
									<td>Rp. {{ $transaction->total_payment }}</td>
									<td>Rp. {{ $transaction->payment }}</td>
									<td>Rp. {{ $transaction->return_payment }}</td>
									<td>
										@if ($transaction->status == 0)
											<span class="label label-warning">Not Paid</span>
										@else
											<span class="label label-success">Paid</span>
										@endif
									</td>
									<td>
										@if ($transaction->status == 0)
										<a href="{{ route('transaction.edit', $transaction->id) }}" class="label label-success">Pay Here</a>
										@else
										<span class="label label-danger">Done</a>
										@endif
									</td>
								</tr>
								{!! Form::close() !!}
							@endforeach
	
						</tbody>
					</table>
				</div>

				<div class="pagination-sm no-margin pull-left">
					{!! $transactions->links(); !!}				
				</div>
			
			</div>
		</div>
	</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection