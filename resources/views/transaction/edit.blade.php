@extends('adminlte::page')

@section('content_header')
	<div class="content-header" style="margin-top: 0px">
      <h1>
        Edit Form Transaction
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('transaction.index') }}">Transaction</a></li>
        <li class="active">Pay Transaction</li>
      </ol>
    </div>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="box-title">Pay Transaction</h1>
						<hr>
						{!! Form::model($transaction, array('route' => ['transaction.update', $transaction->id], 'method' => 'PUT')) !!}
							{{ Form::label('order_id', 'Transaction With Order ID:') }}
							{{ Form::text('order_id', null, ['class' => 'form-control', 'readonly' => 'true']) }}

							{{ Form::label('total_payment', 'Total Payment:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('total_payment', null, array('class' => 'form-control', 'readonly' => 'true')) }}

							{{ Form::label('payment', 'Payment:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('payment', null, array('class' => 'form-control', 'min' => '0')) }}

							{{ Form::label('return_payment', 'Return Payment:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('return_payment', null, ['class' => 'form-control', 'readonly' => 'true']) }}

							<div class="row">
								<div class="col-md-6">
									{{ Form::submit('MAKE A PAYMENT', array('class' => 'btn btn-success btn-lg btn-sm', 'style' => 'margin-top: 20px;')) }}		
								</div>
								<div class="col-md-6">
									{!! Html::linkRoute('transaction.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-sm pull-right', 'style' => 'margin-top: 20px']) !!}
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

@section('js')
	<script>
		$(document).ready(function(){
			$('#payment').change(function(){
  				$('#return_payment').val(parseInt($(this).val()) - parseInt($('#total_payment').val()));
			});
		});
	</script>
@endsection