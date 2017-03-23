@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{trans('blog::blog.Blog')}} #{{ $blog->id }}</h3>
      <div class="box-tools">
        <a href="{{ url('blog/' . $blog->id . '/edit') }}" class="btn btn-default btn-sm" title="Edit Blog"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['blog', $blog->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => trans('blog::blog.Delete'). ' Blog',
                    'onclick'=>'return confirm("'.trans('blog::blog.Confirm delete?').'")'
            ));!!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $blog->id }}</td>
            </tr>
            <tr><th> {{ trans('blog.nome') }} </th><td> {{ $blog->nome }} </td></tr><tr><th> {{ trans('blog.data') }} </th><td> {{ $blog->data }} </td></tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
      <a href="{{ url('/blog') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("blog::blog.Back")}}</a>
    </div>
  </div>
</section>

@endsection
