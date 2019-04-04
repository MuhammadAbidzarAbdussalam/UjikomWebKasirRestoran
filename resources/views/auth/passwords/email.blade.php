@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Send Reset Password link', ['class' => 'btn btn-primary', 'style' => 'margin-top: 20px;']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection