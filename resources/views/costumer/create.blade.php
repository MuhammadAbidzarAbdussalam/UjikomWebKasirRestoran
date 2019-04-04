@extends('adminlte::page')

@section('content_header')
	<div class="content-header" style="margin-top: 0px">
      <h1>
        Create Form Costumer
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('costumer.index') }}">Costumer</a></li>
        <li class="active">Create Costumer</li>
      </ol>
    </div>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="box-title">Create New Costumer</h1>
						<hr>

						{!! Form::open(array('route' => 'costumer.store')) !!}
							{{ Form::label('name', 'Costumer Name:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ex: Beby Tsabina', 'required' => '')) }}

							{{ Form::label('gender', 'Gender:', array('style' => 'margin-top: 20px;')) }}
							<select class="form-control" name="gender">
								<option	value="1">Male</option>
								<option	value="2">Female</option>
							</select>

							{{ Form::label('phone', 'Phone:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'ex: (+62)836XXXXXXXX', 'required' => '', 'data-inputmask' => '"mask": "+62 99999999999"', 'data-mask')) }}
							
							{{ Form::label('address', 'Address:', array('style' => 'margin-top: 20px;')) }}
							{{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'ex: Jln. Gandaria 4, Cibitung, Bekasi', 'required' => '')) }}

							<div class="row">
								<div class="col-md-6">
									{{ Form::submit('CREATE COSTUMER', array('class' => 'btn btn-success btn-lg btn-sm', 'style' => 'margin-top: 20px;')) }}		
								</div>
								<div class="col-md-6">
									{!! Html::linkRoute('costumer.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-sm pull-right', 'style' => 'margin-top: 20px']) !!}
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