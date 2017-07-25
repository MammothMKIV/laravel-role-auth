@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! Form::open(['url' => '/submit-image', 'files' => true]) !!}

                    <div style="color: red">{{ $errors->first('uploadedFile') }}</div>

                    {{ Form::file('uploadedFile') }}

                    <br>

                    {{ Form::submit('Submit')  }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
