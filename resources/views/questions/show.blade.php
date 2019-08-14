@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $question->title }}</div>

                <div class="panel-body">
                    {!! $question->body !!}
                </div>
                <div class="actions">
                    @if(Auth::check() && Auth::user()->owns($question))
                        <span class="edit"><a href="/question/{{ $question->id }}/edit">编辑</a></span>
                        <form action="/question/{{ $question->id }}">
                            {{ method_field('DELETE')}}
                            {{ crsf_token()}}
                            <button class="button delete-button">删除</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
