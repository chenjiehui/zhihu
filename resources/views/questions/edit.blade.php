@extends('layouts.app')

@section('content')
@include('vendor.ueditor.assets')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">编辑问题</div>

                <div class="panel-body">
                    <form action="/questions/{{ $question->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }} 
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                            <label for="title">标题</label>
                            <input type="text" name="title" value="{{ $question->title }}" class="form-control" placeholder="标题" id="title">

                            @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <script id="container" name="body"  type="text/plain">{!! $question->body !!}</script>
                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <button class="btn btn-success pull-right" type="submit" >发布问题</button>
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

<!-- 编辑器容器 -->
@endsection
