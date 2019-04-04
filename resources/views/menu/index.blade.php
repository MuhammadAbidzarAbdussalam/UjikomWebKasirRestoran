@extends('adminlte::page')

@section('content_header')

	<div class="content-header" style="margin-top: 0px">
      <h1>
        Menu List
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('menu.index') }}">Menu</a></li>
        <li class="active">Menu List</li>
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
              		<h3 class="box-title">All Menu</h3>

              		<div class="box-tools">
              		
						<div class="col-md-8">
              				<div class="input-group input-group-sm" style="width: 150px;">
                  				<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  				<div class="input-group-btn">
                    				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  				</div>
                			</div>
              			</div>
              			<div class="col-md-4">
              				<a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">Add Menu</a>
              			</div>
					</div>

            	</div>

				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th style="width: 45px">@sortablelink('id')</th>
							<th>@sortablelink('menu')</th>
							<th>@sortablelink('price')</th>
							<th>Action</th>
						</thead>

						<tbody>
								
							@foreach ($menus as $menu)
								{!! Form::open(['route' => ['menu.destroy', $menu->id], 'method' => 'DELETE']) !!}
								<tr>
									<th>{{ $menu->id }}</th>
									<td>{{ $menu->menu }}</td>
									<td>Rp. {{ $menu->price }}</td>
									<td><a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a> 	{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								</tr>
								{!! Form::close() !!}
							@endforeach
	
							</tbody>
					</table>
				</div>

				<div class="pagination-sm no-margin pull-left">
					{!! $menus->appends(\Request::except('page'))->render() !!}
				</div>
			
			</div>
		</div>
	</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection