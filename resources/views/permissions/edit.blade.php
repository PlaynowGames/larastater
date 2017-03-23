@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('permissions.Edit')}} Roles #{{ $permissions->id }}</h3>
      <div class="box-tools">
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['permissions', $permissions->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('permissions.Delete'). ' Role',
                    'onclick'=>'return confirm("'.trans('permissions.Confirm delete?').'")'
            ));!!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body">
      @if ($errors->any())
          <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      {!! Form::model($permissions, [
          'method' => 'PATCH',
          'url' => ['/permissions/update', $permissions->id],
          'class' => 'form-horizontal'
      ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('permissions.name'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('permissions.Display Name'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('display_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', trans('permissions.Description'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("permissions.Update")}}</button>
                <a href="{{ url('/permissions') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("permissions.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
