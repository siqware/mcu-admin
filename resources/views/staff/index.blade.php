@extends('dashboard.app')
@section('title')
    Staff List
@stop
@section('stylesheet')
    <style></style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <div class="section active">បុគ្គលិក</div>
    </div>
@stop
@section('content')
    <table id="staff_list" class="ui compact selectable striped celled table tablet stackable datatable">
        <thead>
        <tr>
            <th>ល.រ</th>
            <th></th>
            <th>នាមត្រកូល-នាមខ្លួន</th>
            <th>ជាអក្សរឡាតាំង</th>
            <th>ភេទ</th>
            <th>លេខទូរស័ព្ទ</th>
            <th>អ៊ីម៉ែ់ល</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
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
                destroy: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: '{{route('staff.json')}}',
                    method: 'POST'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'profile_picture', name: 'profile_picture',orderable:false,searchcable:false },
                    { data: 'khmer_name', name: 'khmer_name' },
                    { data: 'latin_name', name: 'latin_name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'phone_num', name: 'phone_num' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' }

                ]
            });
        })
    </script>
@stop
@push('css')
    <link href="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.css')}}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery/custom-datatable.js')}}"></script>
@endpush
