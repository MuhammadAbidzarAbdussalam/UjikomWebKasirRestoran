@extends('adminlte::page')

@section('content_header')
	<div class="content-header" style="margin-top: 0px">
      <h1>
        Edit Form Order
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('order.index') }}">Order</a></li>
        <li class="active">Edit Order</li>
      </ol>
    </div>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="box-title">Edit Order</h1>
						<hr>

						{!! Form::model($order, array('route' => ['order.update', $order->id], 'method' => 'PUT')) !!}
							{{ Form::label('costumer_id', 'Choose Costumer:') }}
							{{ Form::select('costumer_id', $costumers, null, ['class' => 'form-control']) }}
							
							<div class="row">
								<div class="col-md-6">
									{{ Form::label('menu_id', 'Choose Menu:', array('style' => 'margin-top: 20px;')) }}
									{{ Form::select('menu_id', $menus, null, ['class' => 'form-control']) }}
								</div>
								<div class="col-md-6">
									{{ Form::label('total', 'Total Menu:', array('style' => 'margin-top: 20px;')) }}
									{{ Form::number('total', null, array('class' => 'form-control')) }}
								</div>
							</div>

						{{-- 	{{ Form::label('total', 'Total Price:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('total', null, array('class' => 'form-control', 'disabled')) }} --}}
							
							{{ Form::label('user_id', 'Made by:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}

							<div class="row">
								<div class="col-md-6">
									{{ Form::submit('SAVE CHANGES', array('class' => 'btn btn-success btn-lg btn-sm', 'style' => 'margin-top: 20px;')) }}		
								</div>
								<div class="col-md-6">
									{!! Html::linkRoute('order.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-sm pull-right', 'style' => 'margin-top: 20px']) !!}
								</div>
							</div>


						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection