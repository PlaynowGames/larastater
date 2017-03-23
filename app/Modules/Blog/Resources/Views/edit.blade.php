@extends('layouts.app')

@section('content')
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('blog::blog.Edit')}} Blog #{{ $blog->id }}</h3>
      <div class="box-tools">
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
    <div class="box-body">
      @if ($errors->any())
          <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      {!! Form::model($blog, [
          'method' => 'PATCH',
          'url' => ['/blog/update', $blog->id],
          'class' => 'form-horizontal'
      ]) !!}
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                {!! Form::label('nome', trans('blog.nome'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
                {!! Form::label('data', trans('blog.data'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::input('datetime-local', 'data', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans("blog::blog.Update")}}</button>
                <a href="{{ url('/blog') }}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i> {{trans("blog::blog.Cancel")}}</a>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
