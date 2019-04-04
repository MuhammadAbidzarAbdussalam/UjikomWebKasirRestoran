@extends('adminlte::page')

@section('content_header')
	<div class="content-header" style="margin-top: 0px">
      <h1>
        Create Form Order
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('order.index') }}">Order</a></li>
        <li class="active">Create Order</li>
      </ol>
    </div>
@endsection
	
@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="box-title">Create New Order</h1>
						<hr>

						{!! Form::open(array('route' => 'order.store')) !!}

							{{ Form::label('costumer_id', 'Choose Costumer:') }}
							<select class="form-control" name="costumer_id" required="">
								@foreach ($costumers as $costumer)
									<option	value="{{ $costumer->id }}">{{ $costumer->name }}</option>
								@endforeach
							</select>
							
							<div class="row">
								<div class="col-md-6">
									{{ Form::label('menu_id', 'Choose Menu:', array('style' => 'margin-top: 20px;')) }}
									<select class="form-control menu" name="menu_id" required="">
										@foreach ($menus as $menu)
											<option	value="{{ $menu->id }}" data-harga="{{ $menu->price }}">{{ $menu->menu }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-6">
									{{ Form::label('total', 'Total Menu:', array('style' => 'margin-top: 20px;')) }}
									{{ Form::number('total', null, array('class' => 'form-control', 'required' => '', 'min' => '0')) }}
								</div>
							</div>

							{{ Form::label('total_payment', 'Total Price:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('total_payment', null, array('class' => 'form-control', 'readonly' => 'true')) }}
							
							{{ Form::label('user_id', 'Made by:', array('style' => 'margin-top: 20px;')) }}
							<select class="form-control" name="user_id">
								@foreach ($users as $user)
									<option	value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>

							<div class="row">
								<div class="col-md-6">
									{{ Form::submit('CREATE ORDER', array('class' => 'btn btn-success btn-lg btn-sm', 'style' => 'margin-top: 20px;')) }}		
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
	{{-- {!! Html::style('css/select2.min.css') !!} --}}
@endsection

@section('js')
	<script>
		$(document).ready(function(){
			$('.menu').change(function(){
  				$('#total_payment').val(parseInt($(this).children('option:selected').data('harga')) * parseInt($('#total').val()));
			});
			$('#total').change(function(){
  				$('#total_payment').val(parseInt($('.menu').children('option:selected').data('harga')) * parseInt($(this).val()));
			});
		});
	</script>
@endsection

{{-- select2-multi menus[]

multiple="multiple" style="width: 695px" --}}