@extends('dashboard.app')
@section('title')
    នាំចេញទិន្នន័យបុគ្គលិក
@stop
@section('stylesheet')
    <style></style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <a href="{{route('staff.index')}}" class="section">បុគ្គលិក</a>
        <i class="right angle icon divider"></i>
        <div class="active section">នាំចេញទៅកាន់ Excele</div>
    </div>
@stop
@section('content')
    <div class="ui segment">
        <table id="staff_list" class="ui celled table datatable nowrap" style="width:100%">
            <thead>
            <tr>
                <th>ល.រ</th>
                <th>អត្តលេខមន្ត្រីរាជការ</th>
                <th>នាមត្រកូល-នាមខ្លួន</th>
                <th>ជាអក្សរឡាតាំង</th>
                <th>ភេទ</th>
                <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>លេខអត្តសញ្ញាណប័ណ្ឌ</th>
                <th>លេខគណនីធនាគារ</th>
                <th>ថ្ងៃខែឆ្នាំតំឡើងថ្នាក់ចុងក្រោយ</th>
                <th>ថ្ងៃខែឆ្នាំចូលបម្រើការងារ</th>
                <th>ថ្ងៃខែឆ្នាំតែងតាំស៊ប់</th>
                <th>ទីកន្លែងកំណើត</th>
                <th>អាស័យដ្ឋានបច្ចុប្បន្ន</th>
                <th>លេខទូរស័ព្ទ</th>
                <th>អ៊ីម៉ែ់ល</th>
                ​{{--bachelor--}}
                <th>bachelor.ឯកទេស</th>
                <th>bachelor.ទីកន្លែងបណ្តុះបណ្តាល</th>
                <th>bachelor.ថ្ងៃខែឆ្នាំចាប់ផ្តើម</th>
                <th>bachelor.ថ្ងៃខែឆ្នាំបញ្ចប់</th>
                {{--master--}}
                <th>master.ឯកទេស</th>
                <th>master.ទីកន្លែងបណ្តុះបណ្តាល</th>
                <th>master.ថ្ងៃខែឆ្នាំចាប់ផ្តើម</th>
                <th>master.ថ្ងៃខែឆ្នាំបញ្ចប់</th>
                {{--doctor--}}
                <th>doctor.ឯកទេស</th>
                <th>doctor.ទីកន្លែងបណ្តុះបណ្តាល</th>
                <th>doctor.ថ្ងៃខែឆ្នាំចាប់ផ្តើម</th>
                <th>doctor.ថ្ងៃខែឆ្នាំបញ្ចប់</th>
                {{--Spouse--}}
                <th>ប្តី/ប្រពន្ធ.ឈ្មោះ</th>
                <th>ប្តី/ប្រពន្ធ.ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>ប្តី/ប្រពន្ធ.មុខរបរ</th>
                <th>ប្តី/ប្រពន្ធ.អង្គភាព</th>
                {{--Children--}}
                <th>កូន.ឈ្មោះ</th>
                <th>កូន.ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>កូន.មុខរបរ</th>
                {{--Father--}}
                <th>ឪពុក.ឈ្មោះ</th>
                <th>ឪពុក.ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>ឪពុក.មុខរបរ</th>
                {{--Mother--}}
                <th>ម្តាយ.ឈ្មោះ</th>
                <th>ម្តាយ.ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>ម្តាយ.មុខរបរ</th>
            </tr>
            </thead>
        </table>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            let register = $('#staff_list').DataTable({
                paging:false,
                processing: true,
                responsive:true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: '{{route('staff.export.json')}}',
                    method: 'POST'
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                return $('#staff_list').DataTable().column( idx ).visible();
                            }
                        },
                    },
                    {
                        extend: 'colvis',
                        text: 'បង្ហា/លាក់',
                        titleAttr: 'បង្ហា/លាក់',
                        title: 'បង្ហា/លាក់',
                        collectionLayout: 'four-column'
                    },
                ],
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'gov_official_no', name: 'gov_official_no' },
                    { data: 'khmer_name', name: 'khmer_name' },
                    { data: 'latin_name', name: 'latin_name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'dob', name: 'dob' },
                    { data: 'id_no', name: 'id_no' },
                    { data: 'bank_acc_no', name: 'bank_acc_no' },
                    { data: 'last_appointment', name: 'last_appointment' },
                    { data: 'start_work', name: 'start_work' },
                    { data: 'real_appoint', name: 'real_appoint' },
                    { data: 'pob_address', name: 'pob_address' },
                    { data: 'curr_address', name: 'curr_address' },
                    { data: 'phone_num', name: 'phone_num' },
                    { data: 'email', name: 'email' },
                    { data: 'bachelor.specialty', name: 'bachelor.specialty' },
                    { data: 'bachelor.po_educated', name: 'bachelor.po_educated' },
                    { data: 'bachelor.start_date', name: 'bachelor.start_date' },
                    { data: 'bachelor.end_date', name: 'bachelor.end_date' },
                    { data: 'master.specialty', name: 'master.specialty' },
                    { data: 'master.po_educated', name: 'master.po_educated' },
                    { data: 'master.start_date', name: 'master.start_date' },
                    { data: 'master.end_date', name: 'master.end_date' },
                    { data: 'doctor.specialty', name: 'doctor.specialty' },
                    { data: 'doctor.po_educated', name: 'doctor.po_educated' },
                    { data: 'doctor.start_date', name: 'doctor.start_date' },
                    { data: 'doctor.end_date', name: 'doctor.end_date' },
                    { data: 'spouse.name', name: 'spouse.name' },
                    { data: 'spouse.dob', name: 'spouse.dob' },
                    { data: 'spouse.job', name: 'spouse.job' },
                    { data: 'spouse.company', name: 'spouse.company' },
                    { data: 'children[0].name', name: 'children.name' },
                    { data: 'children[0].dob', name: 'children.dob' },
                    { data: 'children[0].job', name: 'children.job' },
                    { data: 'father.name', name: 'father.name' },
                    { data: 'father.dob', name: 'father.dob' },
                    { data: 'father.job', name: 'father.job' },
                    { data: 'mother.name', name: 'mother.name' },
                    { data: 'mother.dob', name: 'mother.dob' },
                    { data: 'mother.job', name: 'mother.job' },

                ],
            });
        })
    </script>
@stop
@push('css')
    <link href="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/plugins/jquery/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/plugins/jquery/css/buttons.dataTables.min.css')}}">
@endpush
@push('js')
    <script src="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery/dataTables.responsive.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/plugins/jquery/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/plugins/jquery/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/plugins/jquery/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/plugins/jquery/buttons.colVis.min.js')}}" type="text/javascript"></script>
    {{--<script src="{{asset('dashboard/plugins/jquery/custom-datatable.js')}}"></script>--}}
@endpush
