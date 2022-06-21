@extends('layouts')

@section('header')
    header
@stop

@section('sidebar')
    sidebar
@stop

@section('content')
    content
{{--    模板中输出php变量--}}
{{--    <p>{{$name}}</p>--}}

{{--    --}}{{--    模板中输出php代码--}}
{{--    <p>{{ time() }}</p>--}}
{{--    <p>{{ date('Y-m-d H:i:s') }}</p>--}}
{{--    <p>{{ in_array($name, $arr) ? 'true': 'false' }}</p>--}}
{{--    <p>{{ isset($name) ? $name : 'default' }}</p>--}}
{{--    <p>{{ $name or 'default' }}</p>--}}

{{--    --}}{{--    原样输出 --}}
{{--    <p>@{{$name}}</p>--}}

{{--    --}}{{--    引入子视图 include --}}
{{--    @include('student.common1', ['message'=>'我是错误信息'])--}}

{{--    流程控制--}}
    <br />
    @if($name == 'sean')
        I'm sean
    @elseif($name == 'wgq')
        I'm wgq<br/>
    @endif

    {{--    url--}}
    <a href="{{  url('url') }}">url()</a>
    <br />
    <a href="{{  action('StudentController@urlTest') }}">url()</a>
    <br />
    <a href="{{ route('url') }}">route()</a>

@stop