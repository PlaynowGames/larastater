@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('users.Edit')}} Users #{{ $users->id }}</h3>
      <div class="box-tools">
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['users', $users->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('users.Delete'). ' User',
                    'onclick'=>'return confirm("'.trans('users.Confirm delete?').'")'
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
      {!! Form::model($users, [
          'method' => 'PATCH',
          'url' => ['/users/update', $users->id],
          'class' => 'form-horizontal'
      ]) !!}
      <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
          {!! Form::label('Name', trans('users.name'), ['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
          </div>
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
          {!! Form::label('Email', trans('users.email'), ['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
              {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
          </div>
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
          {!! Form::label('Password', trans('users.Password'), ['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
              {!! Form::password('password', ['class' => 'form-control']) !!}
              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
          </div>
      </div>

      <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
          {!! Form::label('Roles', trans('users.Roles'), ['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
          {!! Form::select('role', $roles, $rol_user->role_id, ['class' => 'form-control', 'required' => 'required']); !!}
          </div>
      </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("users.Update")}}</button>
                <a href="{{ url('/users') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("users.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
