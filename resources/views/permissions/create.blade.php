@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('permissions.Create New')}} Permissions</h3>
    </div>
    <div class="box-body">
      @if ($errors->any())
          <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      {!! Form::open(['url' => '/permissions/store', 'class' => 'form-horizontal']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('Name', trans('permissions.name'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
                {!! Form::label('Display Name', trans('permissions.Display Name'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('display_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('Description', trans('permissions.Description'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{trans("permissions.Create")}}</button>
                <a href="{{ url('/permissions') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("permissions.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection
