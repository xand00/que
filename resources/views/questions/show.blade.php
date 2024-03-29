@extends('layouts.app')

@section('content')
  <a href="/questions" class="btn btn-primary m-2">Go Back</a>
  <div class="jumbotron card bg-light m-2 p-4">
    <h3 class="card-title text-center">{{$question->title}}</h3>
    <p>{{$question->body}}</p>
    @foreach($question->images as $image)
      <div class="m-3 d-inline">
        <a href="/images/{{$image->title}}"><img class="" src="/images/{{$image->title}}" style="width: 15%; height: 15%;" alt=""></a>
      </div>
    @endforeach
    <small>Written on {{$question->created_at}} by {{$question->user->name}}</small>
  </div>
  <hr>
  @if(!Auth::guest())
    @if(Auth::user()->id == $question->user_id)
      <a href="/questions/{{$question->id}}/edit" class="btn btn-primary">Edit</a>

      {!!Form::open(['action' => ['QuestionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger mt-2'])}}
      {!!Form::close()!!}
    @endif
    <hr>
    {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('body', 'Post comment')}}
        {!! Form::hidden('question_id', $question->id) !!}
        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
      </div>
      {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  @endif

  <h3 class="text-center">Comments</h3>
    @if(count($question->comments) > 0)
      @foreach($question->comments as $comment)
        <div class="jumbotron card bg-light m-2 p-4">
          <p>{{$comment->body}}</p>
          <small>Written on {{$comment->created_at}} by {{$comment->user->name}}</small>
          @if(!Auth::guest())
            @if(Auth::user()->id == $comment->user_id)
              <a href="/comments/{{$comment->id}}/edit" class="btn btn-primary" style="width: 60px">Edit</a>
              {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::hidden('question_id', $comment->question_id)}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger mt-2'])}}
              {!!Form::close()!!}
            @endif
          @endif
        </div>
      @endforeach
    @else
      <p>No comments</p>
    @endif
@endsection