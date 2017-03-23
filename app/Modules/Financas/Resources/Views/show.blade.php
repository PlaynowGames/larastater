@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('financas::financas.Financas')}} #{{ $financa->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('financas/' . $financa->id . '/edit') }}" class="btn btn-default btn-sm" title="Edit Financa"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['financas', $financa->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('financas::financas.Delete'). ' Financa',
                    'onclick'=>'return confirm("'.trans('financas::financas.Confirm delete?').'")'
            ));!!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $financa->id }}</td>
            </tr>
            <tr><th> {{ trans('financas.nome') }} </th><td> {{ $financa->nome }} </td></tr><tr><th> {{ trans('financas.data') }} </th><td> {{ $financa->data }} </td></tr><tr><th> {{ trans('financas.valor') }} </th><td> {{ $financa->valor }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/financas') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("financas::financas.Back")}}</a>
    </div>
  </div>
</section>

@endsection
