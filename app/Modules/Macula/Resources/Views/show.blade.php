@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('macula::macula.Macula')}} #{{ $macula->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('macula/edit/' . $macula->id . '') }}" class="btn btn-default btn-sm" title="Edit Macula"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['macula/delete', $macula->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('macula::macula.Delete'). ' Macula',
                    'onclick'=>'return confirm("'.trans('macula::macula.Confirm delete?').'")'
            ));!!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $macula->id }}</td>
            </tr>
            <tr><th> {{ trans('macula.nome') }} </th><td> {{ $macula->nome }} </td></tr><tr><th> {{ trans('macula.data') }} </th><td> {{ $macula->data }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/macula') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("macula::macula.Back")}}</a>
    </div>
  </div>
</section>

@endsection
