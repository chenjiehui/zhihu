@extends('layouts.app')
@section('content')
@include('vendor.ueditor.assets')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $question->title }}</div>

                <div class="panel-body">
                    {!! $question->body !!}
                </div>
                <div class="actions">
                        <span class="edit"><a href="/questions/{{ $question->id }}/edit">编辑</a></span>
                        <form action="/questions/{{ $question->id }}" method="post" class="delete-button" >
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="button delete-button">删除</button>
                        </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"> 
                <div class="panel-heading">{{ $question->answers_count }}个答案</div>

                <div class="panel-body">

                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="media-left">
                                <a href="">
                                    <img src="{{ url($answer->user->avatar) }}" alt="{{ $answer->user->name }}">
                                </a>
                            </div>                            
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="/questions/{{ $answer->user->name }}">
                                        {{ $answer->user->name }} 
                                    </a>
                                </h4>
                                {!! $answer->body !!}
                            </div>
                        </div>

                    @endforeach


                    <form action="/questions/{{ $question->id }}/answer" method="post">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <script id="container" name="body" style="height:120px" type="text/plain">{!! old('body') !!}</script>
                            @if ($errors->has('body'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <button class="btn btn-success pull-right" type="submit" >提交答案</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

@endsection
