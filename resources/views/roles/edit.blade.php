@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('roles.Edit')}} Roles #{{ $roles->id }}</h3>
            <div class="box-tools">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['roles', $roles->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('roles.Delete'). ' Role',
                    'onclick'=>'return confirm("'.trans('roles.Confirm delete?').'")'
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
                {!! Form::model($roles, [
                    'method' => 'PATCH',
                    'url' => ['/roles/update', $roles->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('name', trans('roles.name'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
                        {!! Form::label('name', trans('roles.Display Name'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::text('display_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::label('description', trans('roles.Description'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::label('Permissions', trans('roles.Permissions'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            @if (count($permissions) > 0)
                                @foreach ($permissions as $key => $perm)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="permissions[]" value="{{ $perm->id }}" {!! Entrust::can($perm->name) ? 'checked':''; !!}>
                                        {{ $perm->display_name }}
                                    </label>
                                </div>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("roles.Update")}}</button>
                            <a href="{{ url('/roles') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("roles.Cancel")}}</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </section>

        @endsection
