@extends('dashboard.app')
@section('title')
    Media
@stop
@section('stylesheet')
    <style>

    </style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <a class="section">Home</a>
        <i class="right angle icon divider"></i>
        <div class="section active">Media</div>
    </div>
@stop
@section('content')
    {{--Content here--}}
    <iframe src="laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
@stop
@section('js')
    <script>
        $(function () {
            ///
        })
    </script>
@stop
@push('css')
    <link rel="stylesheet" href="">
@endpush
@push('js')
    <script src=""></script>
@endpush
