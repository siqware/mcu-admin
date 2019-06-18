@extends('dashboard.app')
@section('title')
    Blank
@stop
@section('stylesheet')
    <style>

    </style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <a class="section">Home</a>
        <i class="right angle icon divider"></i>
        <a class="section active">Blank</a>
    </div>
@stop
@section('content')
    {{--Content here--}}
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
