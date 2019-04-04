@extends('adminlte::page')

@section('content_header')
	<div class="content-header" style="margin-top: 0px">
      <h1>
        Edit Form Menu
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('menu.index') }}">Menu</a></li>
        <li class="active">Edit Menu</li>
      </ol>
    </div>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="box-title">Edit Menu</h1>
						<hr>

						{!! Form::model($menu, array('route' => ['menu.update', $menu->id], 'method' => 'PUT')) !!}
							{{ Form::label('menu', 'Menu Name:') }}
							{{ Form::text('menu', null, array('class' => 'form-control', 'placeholder' => 'ex: Mie Ayam', 'required' => '')) }}

							{{ Form::label('price', 'Menu Price (Rp):', array('style' => 'margin-top: 20px;')) }}
							{{ Form::number('price', null, array('class' => 'form-control', 'placeholder' => 'ex: 15000', 'required' => '')) }}
							<div class="row">
								<div class="col-md-6">
									{{ Form::submit('SAVE CHANGES', array('class' => 'btn btn-success btn-lg btn-sm', 'style' => 'margin-top: 20px;')) }}		
								</div>
								<div class="col-md-6">
									{!! Html::linkRoute('menu.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-sm pull-right', 'style' => 'margin-top: 20px']) !!}
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