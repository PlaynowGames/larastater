@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('lancamentos::lancamentos.Lancamentos')}} #{{ $lancamento->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('lancamentos/edit/' . $lancamento->id . '') }}" class="btn btn-default btn-sm" title="Edit Lancamento"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['lancamentos/delete', $lancamento->id],
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
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $lancamento->id }}</td>
            </tr>
            <tr><th> {{ trans('lancamentos.nome') }} </th><td> {{ $lancamento->nome }} </td></tr><tr><th> {{ trans('lancamentos.data') }} </th><td> {{ $lancamento->data }} </td></tr><tr><th> {{ trans('lancamentos.valor') }} </th><td> {{ $lancamento->valor }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/lancamentos') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("lancamentos::lancamentos.Back")}}</a>
    </div>
  </div>
</section>

@endsection
