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
        <div class="section active">ការជូនដំណឹង</div>
    </div>
@stop
@section('content')
    {{--Content here--}}
    <div class="ui segments">
        <div class="ui segment">
            <div class="ui feed timeline">
                @foreach($relaxes as $relax)
                    <div class="event popupHover">
                    <div class="label">
                        <img class="ui avatar" src="{{asset($relax['staff']['profile_picture'])}}" alt="label-image" />
                    </div>
                    <div class="content">
                        <div class="summary">
                            បុគ្គលិក
                            <a class="user" href="{{route('staff.show',$relax['staff']['id'])}}">
                                {{$relax['staff']['khmer_name']}}
                            </a> ត្រូវដាក់ពាក្យចួលបំពេញការងារវិញ
                        </div>
                        <form class="extra" method="post" action="{{route('notification.relax.update',$relax->id)}}">
                            {{@csrf_field()}}
                            {{@method_field('put')}}
                            <button class="ui label">
                                <i class="green check icon"></i> បញ្ចប់ការជួនដំណឹង
                            </button>
                        </form>
                    </div>
                </div>
                    <div class="ui flowing popup top left transition hidden">
                        <div class="ui two column divided grid">
                            <div class="column">
                                <div class="ui horizontal divider">
                                    <h4 class="ui header">កាលបរិច្ឆេទ</h4>
                                </div>
                                <p>នៅសល់ចំនួន <b>{{$relax->message_duration}}</b> ថ្ងៃទៀត</p>
                                <p>នឹងផុតកំណត់នៅ <b>{{$relax->formatDate($relax->expire_date)}}</b></p>
                            </div>
                            <div class="column">
                                <div class="ui horizontal divider">
                                    <h4 class="ui header">ទំនាក់ទំនង</h4>
                                </div>
                                <p><b>លេខទួរស័ព្ទ</b> {{$relax->staff->phone_num}}</p>
                                <p><b>អ៊ីម៉ែល</b> {{$relax->staff->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider my-0"></div>
                @endforeach
                    @foreach($conti_studies as $conti_study)
                        <div class="event popupHover">
                    <div class="label">
                        <img class="ui avatar" src="{{asset($conti_study['staff']['profile_picture'])}}" alt="label-image" />
                    </div>
                    <div class="content">
                        <div class="summary">
                            បុគ្គលិក
                            <a class="user" href="{{route('staff.show',$conti_study['staff']['id'])}}">
                                {{$conti_study['staff']['khmer_name']}}
                            </a>ត្រូវដាក់ពាក្យបន្តរការសិក្សា ឫចួលបំពេញការងារវិញ
                        </div>
                        <form class="extra" method="post" action="{{route('notification.conti.update',$conti_study->id)}}">
                            {{@csrf_field()}}
                            {{@method_field('put')}}
                            <button class="ui label">
                                <i class="green check icon"></i> បញ្ចប់ការជួនដំណឹង
                            </button>
                        </form>
                    </div>
                </div>
                        <div class="ui flowing popup top left transition hidden">
                            <div class="ui two column divided grid">
                                <div class="column">
                                    <div class="ui horizontal divider">
                                        <h4 class="ui header">កាលបរិច្ឆេទ</h4>
                                    </div>
                                    <p>នៅសល់ចំនួន <b>{{$conti_study->message_duration}}</b> ថ្ងៃទៀត</p>
                                    <p>នឹងផុតកំណត់នៅ <b>{{$conti_study->formatDate($conti_study->expire_date)}}</b></p>
                                </div>
                                <div class="column">
                                    <div class="ui horizontal divider">
                                        <h4 class="ui header">ទំនាក់ទំនង</h4>
                                    </div>
                                    <p><b>លេខទួរស័ព្ទ</b> {{$conti_study->staff->phone_num}}</p>
                                    <p><b>អ៊ីម៉ែល</b> {{$conti_study->staff->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="ui divider my-0"></div>
                    @endforeach
            </div>
        </div>
    </div>
@stop
@section('js')
@stop
@push('css')
    <link rel="stylesheet" href="">
@endpush
@push('js')
    <script src="{{asset('dashboard/js/custom-timeline.js')}}"></script>
@endpush
