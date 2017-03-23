@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('lancamentos::lancamentos.Edit')}} Lancamento #{{ $lancamento->id }}</h3>
      <div class="box-tools">
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['lancamentos', $lancamento->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('lancamentos::lancamentos.Delete'). ' Lancamento',
                    'onclick'=>'return confirm("'.trans('lancamentos::lancamentos.Confirm delete?').'")'
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
      {!! Form::model($lancamento, [
          'method' => 'PATCH',
          'url' => ['/lancamentos/update', $lancamento->id],
          'class' => 'form-horizontal'
      ]) !!}
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                {!! Form::label('nome', trans('lancamentos.nome'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
                {!! Form::label('data', trans('lancamentos.data'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::input('datetime-local', 'data', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
                {!! Form::label('valor', trans('lancamentos.valor'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::number('valor', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("lancamentos::lancamentos.Update")}}</button>
                <a href="{{ url('/lancamentos') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("lancamentos::lancamentos.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
