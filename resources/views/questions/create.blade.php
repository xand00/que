@extends('layouts.app')

@section('content')
  <h3 class="m-3 text-center">Create Question</h3>
  {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
      {{Form::label('images', 'Images')}}
      {{Form::file('images[]', ['multiple' => 'multiple'])}}
    </div>
    {!! Form::token() !!}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection