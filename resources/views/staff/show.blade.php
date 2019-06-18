@extends('dashboard.app')
@section('title')
    {{$staff->khmer_name}}
@stop
@section('stylesheet')
    <style>

    </style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <a href="{{route('staff.index')}}" class="section">បុគ្គលិក</a>
        <i class="right angle icon divider"></i>
        <div class="section active">{{$staff->khmer_name}}</div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="column">
            <div class="ui segments">
                <div class="ui segment">
                    <h5 class="ui header right aligned grid">
                        <div class="left floated left aligned middle aligned six wide column py-0">
                            <h3>ពត៌មានបុគ្គលិក</h3>
                        </div>
                        <div class="right floated right aligned six wide column py-0">
                            <form method="post" action="{{route('staff.destroy',$staff->id)}}">
                                <div class="ui buttons mb-0">
                                    {{csrf_field().method_field('delete')}}
                                    <a data-content="កែប្រែ" data-variation="larg" href="{{route('staff.edit', $staff->id)}}" class="ui mini button popupHover green"><i class="edit icon"></i></a>
                                    <div class="or"></div>
                                    <button data-content="លុប" data-variation="larg" class="ui mini button popupHover pink"><i class="remove icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </h5>
                </div>
                <div class="ui segment">
                    <div class="ui pointing secondary menu">
                        <a class="item active" data-tab="first">ពត៌មានទូទៅ</a>
                        <a class="item" data-tab="second">ការអប់រំ</a>
                        <a class="item" data-tab="third">គ្រួសារ</a>
                        <a class="item" data-tab="forth">ព្រួរពាក្យ ឫសំុអនុញ្ញាតច្បាប់</a>
                    </div>
                    <div class="ui tab segment active" data-tab="first">
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="four wide column">រូបភាពប្រូហ្វាល</td>
                                <td class="twelve wide column">
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->profile_picture)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="three wide">នាមត្រកូល-នាមខ្លួន</td>
                                <td class="twelve wide">{{$staff->khmer_name}}</td>
                            </tr>
                            <tr>
                                <td>ជាអក្សរឡាតាំង</td>
                                <td>{{$staff->latin_name}}</td>
                            </tr>
                            <tr>
                                <td>អត្តលេខមន្ត្រីរាជការ</td>
                                <td>{{$staff->gov_official_no}}</td>
                            </tr>
                            <tr>
                                <td>ភេទ</td>
                                <td>{{$staff->gender}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                                <td>{{$staff->dob}}</td>
                            </tr>
                            <tr>
                                <td>ឯកទេស(អប់រំ)</td>
                                <td>{{$staff->skill}}</td>
                            </tr>
                            <tr>
                                <td>លេខអត្តសញ្ញាណប័ណ្</td>
                                <td>{{$staff->id_no}}</td>
                            </tr>
                            <tr>
                                <td>លេខគណនីធនាគារ</td>
                                <td>{{$staff->bank_acc_no}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំដំឡើងថ្នាក់ចុងក្រោយ</td>
                                <td>{{$staff->last_appointment}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចូលបម្រើការងាររដ្ឋ</td>
                                <td>{{$staff->start_work}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំតែងតាំងស៊ប់</td>
                                <td>{{$staff->real_appoint}}</td>
                            </tr>
                            <tr>
                                <td>អ៊ីម៉ែ់ល</td>
                                <td>{{$staff->email}}</td>
                            </tr>
                            <tr>
                                <td>លេខទូរស័ព្ទ</td>
                                <td>{{$staff->phone_num}}</td>
                            </tr>
                            <tr>
                                <td>ទីកន្លែងកំណើត</td>
                                <td>{{$staff->pob_village[0]->name.', '.$staff->pob_commune[0]->name.', '.$staff->pob_district[0]->name.', '.$staff->pob_province[0]->name}}</td>
                            </tr>
                            <tr>
                                <td>អាស័យដ្ឋានបច្ចុប្បន្ន</td>
                                <td>{{$staff->village[0]->name.', '.$staff->commune[0]->name.', '.$staff->district[0]->name.', '.$staff->province[0]->name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui tab segment" data-tab="second">
                        <h4 class="ui dividing header">សញ្ញាបត្របរិញ្ញាបត្រ</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឯកទេស</td>
                                <td class="twelve wide">{{$staff->bachelor->specialty}}</td>
                            </tr>
                            <tr>
                                <td>ទីកន្លែងបណ្តុះបណ្តាល</td>
                                <td>{{$staff->bachelor->po_educated}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចាប់ផ្តើម</td>
                                <td>{{$staff->bachelor->start_date}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំបញ្ចប់</td>
                                <td>{{$staff->bachelor->end_date}}</td>
                            </tr>
                            <tr>
                                <td>Attachment</td>
                                <td>
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->bachelor->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h4 class="ui dividing header">សញ្ញាបត្របរិញ្ញាបត្រជាន់ខ្ពស់</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឯកទេស</td>
                                <td class="twelve wide">{{$staff->master->specialty}}</td>
                            </tr>
                            <tr>
                                <td>ទីកន្លែងបណ្តុះបណ្តាល</td>
                                <td>{{$staff->master->po_educated}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចាប់ផ្តើម</td>
                                <td>{{$staff->master->start_date}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំបញ្ចប់</td>
                                <td>{{$staff->master->end_date}}</td>
                            </tr>
                            <tr>
                                <td>Attachment</td>
                                <td>
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->master->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h4 class="ui dividing header">សញ្ញាបត្របបណ្ឌិត</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឯកទេស</td>
                                <td class="twelve wide">{{$staff->doctor->specialty}}</td>
                            </tr>
                            <tr>
                                <td>ទីកន្លែងបណ្តុះបណ្តាល</td>
                                <td>{{$staff->doctor->po_educated}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចាប់ផ្តើម</td>
                                <td>{{$staff->doctor->start_date}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំបញ្ចប់</td>
                                <td>{{$staff->doctor->end_date}}</td>
                            </tr>
                            <tr>
                                <td>Attachment</td>
                                <td>
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->doctor->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui tab segment" data-tab="third">
                        <h4 class="ui dividing header">ឪពុក</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឈ្មោះ</td>
                                <td class="twelve wide">{{$staff->father->name}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                                <td>{{$staff->father->dob}}</td>
                            </tr>
                            <tr>
                                <td>មុខរបរ</td>
                                <td>{{$staff->father->job}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h4 class="ui dividing header">ម្តាយ</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឈ្មោះ</td>
                                <td class="twelve wide">{{$staff->mother->name}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                                <td>{{$staff->mother->dob}}</td>
                            </tr>
                            <tr>
                                <td>មុខរបរ</td>
                                <td>{{$staff->mother->job}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <h4 class="ui dividing header">ប្តី ឬ ប្រពន្ធ</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឈ្មោះ</td>
                                <td class="twelve wide">{{$staff->spouse->name}}</td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                                <td>{{$staff->spouse->dob}}</td>
                            </tr>
                            <tr>
                                <td>មុខរបរ</td>
                                <td>{{$staff->spouse->job}}</td>
                            </tr>
                            <tr>
                                <td>អង្គភាព</td>
                                <td>{{$staff->spouse->company}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <h4 class="ui dividing header">កូន</h4>
                        <table class="ui fluid celled table">
                            <thead>
                            <tr>
                                <th class="three wide">ឈ្មោះ</th>
                                <th class="three wide">ថ្ងៃខែឆ្នាំកំណើត</th>
                                <th class="three wide">មុខរបរ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staff->children as $child)
                            <tr>
                                <td>{{$child->name}}</td>
                                <td>{{$child->dob}}</td>
                                <td>{{$child->job}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="ui tab segment" data-tab="forth">
                        <h4 class="ui dividing header">ព្រួរពាក្យ</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឯកសារ</td>
                                <td class="twelve wide">
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->relax->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចុះឯកសារ</td>
                                <td>{{$staff->relax->formatDate($staff->relax->attachment_date)}}</td>
                            </tr>
                            <tr>
                                <td>កំឡុងពេលព្យួរពាក្យ</td>
                                <td>{{$staff->relax->formatDate($staff->relax->to_date).' - '.$staff->relax->formatDate($staff->relax->to_date)}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h4 class="ui dividing header">សំុអនុញ្ញាតច្បាប់</h4>
                        <table class="ui fluid celled table">
                            <tbody>
                            <tr>
                                <td class="three wide">ឯកសារ</td>
                                <td class="twelve wide">
                                    <img class="ui image bordered p-2" id="profile_holder" src="{{asset($staff->continue_studying->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td>ថ្ងៃខែឆ្នាំចុះឯកសារ</td>
                                <td>{{$staff->continue_studying->formatDate($staff->continue_studying->attachment_date)}}</td>
                            </tr>
                            <tr>
                                <td>កំឡុងពេលព្យួរពាក្យ</td>
                                <td>{{$staff->continue_studying->formatDate($staff->continue_studying->to_date).' - '.$staff->continue_studying->formatDate($staff->continue_studying->to_date)}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            /*init popup*/
            let popupClasses = document.querySelectorAll('.popupHover');
            $.each(popupClasses, function (index, el) {
                $(el).popup();
            });
        })
    </script>
@stop
@push('css')
    {{--<link rel="stylesheet" href="">--}}
@endpush
@push('js')
@endpush
