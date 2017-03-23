@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('relatorios::relatorios.Edit')}} Relatorio #{{ $relatorio->id }}</h3>
      <div class="box-tools">
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['relatorios/delete', $relatorio->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('relatorios::relatorios.Delete'). ' Relatorio',
                    'onclick'=>'return confirm("'.trans('relatorios::relatorios.Confirm delete?').'")'
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
      {!! Form::model($relatorio, [
          'method' => 'PATCH',
          'url' => ['/relatorios/update', $relatorio->id],
          'class' => 'form-horizontal'
      ]) !!}
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                {!! Form::label('nome', trans('relatorios.nome'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
                {!! Form::label('valor', trans('relatorios.valor'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::number('valor', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("relatorios::relatorios.Update")}}</button>
                <a href="{{ url('/relatorios') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("relatorios::relatorios.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
