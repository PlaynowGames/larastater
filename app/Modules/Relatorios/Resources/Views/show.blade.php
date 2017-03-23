@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('relatorios::relatorios.Relatorios')}} #{{ $relatorio->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('relatorios/edit/' . $relatorio->id . '') }}" class="btn btn-default btn-sm" title="Edit Relatorio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
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
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $relatorio->id }}</td>
            </tr>
            <tr><th> {{ trans('relatorios.nome') }} </th><td> {{ $relatorio->nome }} </td></tr><tr><th> {{ trans('relatorios.valor') }} </th><td> {{ $relatorio->valor }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/relatorios') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("relatorios::relatorios.Back")}}</a>
    </div>
  </div>
</section>

@endsection
