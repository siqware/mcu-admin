@extends('dashboard.app')
@section('title')
    Home
@stop
@section('stylesheet')
    <style>
        body {
            color: #0ea432 !important;
        }
    </style>
@stop
@section('breadcrumb')
    <div class="ui breadcrumb my-3">
        <a href="{{route('staff.index')}}" class="section">បុគ្គលិក</a>
        <i class="right angle icon divider"></i>
        <div class="active section">កែប្រែ</div>
    </div>
@stop
@section('content')
    <div class="ui grid">
        {{Form::open(['url'=>route('staff.update',$staff->id),'method'=>'put','class'=>'ui form sixteen wide column'])}}
        <div class="ui segment">
            <h3 class="ui dividing header">ពត៌មានទូទៅ</h3>
            <table class="ui fluid celled table">
                <tbody>
                <tr>
                    <td class="four wide column right aligned">រូបភាពប្រូហ្វាល</td>
                    <td class="twelve wide column">
                        <div class="ui input" id="lfm" data-input="profile" data-preview="profile_holder">
                            <div class="ui button">
                                <img id="profile_holder" src="{{asset($staff->profile_picture)}}"
                                     style="margin-top:15px;max-height:100px;">
                            </div>
                            <input id="profile" type="hidden" value="{{$staff->profile_picture}}" name="profile_picture">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="four wide column right aligned">នាមត្រកូល-នាមខ្លួន</td>
                    <td class="twelve wide column">
                        <div class="two fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->khmer_name}}" name="khmer_name"
                                       placeholder="អក្សរខ្មែរ">
                            </div>
                            <div class="field">
                                <input type="text" value="{{$staff->latin_name}}" name="latin_name"
                                       placeholder="អក្សរឡាតាំង">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">អត្តលេខមន្ត្រីរាជការ</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->gov_official_no}}" name="gov_official_no"
                                       placeholder="អត្តលេខមន្ត្រីរាជការ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ភេទ</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <div class="ui selection dropdown" tabindex="0">
                                    <input name="gender" value="{{$staff->gender}}" type="hidden" placeholder="ភេទ">
                                    <div class="default text">ភេទ</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                        <div class="item" data-value="ប្រុស">ប្រុស</div>
                                        <div class="item" data-value="ស្រី">ស្រី</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ថ្ងៃខែឆ្នាំកំណើត</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <div class="ui calendar" id="dob">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->dob}}" name="dob"
                                               placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ឯកទេស(អប់រំ)</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->skill}}" name="skill" placeholder="ឯកទេស(អប់រំ)">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">លេខអត្តសញ្ញាណប័ណ្</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->id_no}}" name="id_no"
                                       placeholder="លេខអត្តសញ្ញាណប័ណ្">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">លេខគណនីធនាគារ</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->bank_acc_no}}" name="bank_no"
                                       placeholder="លេខគណនីធនាគារ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ថ្ងៃខែឆ្នាំ</td>
                    <td>
                        <div class="three fields m-0">
                            <div class="field">
                                <label>ដំឡើងថ្នាក់ចុងក្រោយ</label>
                                <div class="ui calendar" id="d_step_1">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->last_appointment}}" name="last_appointment"
                                               placeholder="ដំឡើងថ្នាក់ចុងក្រោយ">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>ចូលបម្រើការងាររដ្ឋ</label>
                                <div class="ui calendar" id="d_step_2">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->start_work}}" name="start_work"
                                               placeholder="ចូលបម្រើការងាររដ្ឋ">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>តែងតាំងស៊ប់</label>
                                <div class="ui calendar" id="d_step_3">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->real_appoint}}" name="real_appointment"
                                               placeholder="តែងតាំងស៊ប់">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ទំនាក់ទំនង</td>
                    <td>
                        <div class="two fields m-0">
                            <div class="field">
                                <input type="email" value="{{$staff->email}}" name="email" placeholder="អ៊ីម៉ែ់ល">
                            </div>
                            <div class="field">
                                <input type="text" value="{{$staff->phone_num}}" name="phone" placeholder="លេខទូរស័ព្ទ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ទីកន្លែងកំណើត</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <div class="ui search selection dropdown" id="province">
                                    <input type="hidden" name="pob[province]" placeholder="ខេត្ត/ក្រុង">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ខេត្ត/ក្រុង...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="district">
                                    <input type="hidden" name="pob[district]" placeholder="ស្រុក/ខណ្ឌ">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ស្រុក/ខណ្ឌ...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="commune">
                                    <input type="hidden" name="pob[commune]" placeholder="ឃំុ/សង្កាត់">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ឃំុ/សង្កាត់...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="village">
                                    <input type="hidden" name="pob[village]" placeholder="ភូមិ">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ភូមិ...</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">អាស័យដ្ឋានបច្ចុប្បន្ន</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <div class="ui search selection dropdown" id="province1">
                                    <input type="hidden" name="curr[province]" placeholder="ខេត្ត/ក្រុង">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ខេត្ត/ក្រុង...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="district1">
                                    <input type="hidden" name="curr[district]" placeholder="ស្រុក/ខណ្ឌ">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ស្រុក/ខណ្ឌ...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="commune1">
                                    <input type="hidden" name="curr[commune]" placeholder="ឃំុ/សង្កាត់">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ឃំុ/សង្កាត់...</div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui search selection dropdown" id="village1">
                                    <input type="hidden" name="curr[village]" placeholder="ភូមិ">
                                    <i class="dropdown icon"></i>
                                    <input type="text" class="search">
                                    <div class="default text">ជ្រើសរើស ភូមិ...</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="ui segment">
            <h3 class="ui dividing header">ការអប់រំ</h3>
            <table class="ui fluid celled table">
                <tbody>
                <tr>
                    <td class="four wide column right aligned">សញ្ញាបត្របរិញ្ញាបត្រ</td>
                    <td class="twelve wide column">
                        <div class="ui segment">
                            <div class="four fields m-0">
                                <div class="field">
                                    <label>ឯកទេស</label>
                                    <input type="text" value="{{$staff->bachelor->specialty}}"
                                           name="bachelor[specialty]" placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <label>ទីកន្លែងបណ្តុះបណ្តាល</label>
                                    <input type="text" value="{{$staff->bachelor->po_educated}}"
                                           name="bachelor[po_educated]" placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <label>ថ្ងៃខែឆ្នាំចាប់ផ្តើម</label>
                                    <div class="ui calendar bachelor" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" value="{{$staff->bachelor->start_date}}"
                                                   name="bachelor[start_date]" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>ថ្ងៃខែឆ្នាំបញ្ចប់</label>
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" value="{{$staff->bachelor->end_date}}"
                                                   name="bachelor[end_date]" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input" id="lfm" data-input="thumbnail_bachelor"
                                         data-preview="bachelor_holder">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_bachelor" value="{{$staff->bachelor->attachment}}" type="text" name="bachelor[attachment]">
                                    </div>
                                    <img id="bachelor_holder" src="{{asset($staff->bachelor->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">សញ្ញាបត្របរិញ្ញាបត្រជាន់ខ្ពស់</td>
                    <td>
                        <div class="ui segment">
                            <div class="four fields m-0">
                                <div class="field">
                                    <input type="text" value="{{$staff->master->specialty}}" name="master[specialty]"
                                           placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <input type="text" value="{{$staff->master->po_educated}}"
                                           name="master[po_educated]" placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" value="{{$staff->master->start_date}}"
                                                   name="master[start_date]" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" value="{{$staff->master->end_date}}"
                                                   name="master[end_date]" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input" id="lfm" data-input="thumbnail_master"
                                         data-preview="master_holder">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_master" value="{{$staff->master->attachment}}" type="text" name="master[attachment]">
                                    </div>
                                    <img id="master_holder" src="{{asset($staff->master->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        សញ្ញាបត្របណ្ឌិត
                    </td>
                    <td>
                        <div class="ui segment">
                            <div class="ui inverted doctorDimmer dimmer"></div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <input class="doctor_nan_able" value="{{$staff->master->specialty}}"
                                           name="doctor[specialty]" type="text" placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <input class="doctor_nan_able" value="{{$staff->master->po_educated}}"
                                           name="doctor[po_educated]" type="text"
                                           placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="doctor_nan_able" value="{{$staff->master->start_date}}"
                                                   name="doctor[start_date]" type="text"
                                                   placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="doctor_nan_able" value="{{$staff->master->end_date}}"
                                                   name="doctor[end_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input" id="lfm" data-input="thumbnail_doctor"
                                         data-preview="doctor_holder">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_doctor" value="{{$staff->master->attachment}}" type="text" name="doctor[attachment]">
                                    </div>
                                    <img id="doctor_holder" src="{{asset($staff->master->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="ui segment">
            <h3 class="ui dividing header">គ្រួសារ</h3>
            <table class="ui fluid celled table">
                <tbody>
                <tr>
                    <td class="four wide column right aligned">ប្តី ឬ ប្រពន្ធ</td>
                    <td class="twelve wide column">
                        <div class="four fields m-0">
                            <div class="field">
                                <label>ឈ្មោះ</label>
                                <input type="text" value="{{$staff->spouse->name}}" name="spouse[name]"
                                       placeholder="ឈ្មោះ">
                            </div>
                            <div class="field">
                                <label>ថ្ងៃខែឆ្នាំកំណើត</label>
                                <div class="ui calendar" id="family_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->spouse->dob}}" name="spouse[dob]"
                                               placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>មុខរបរ</label>
                                <input type="text" value="{{$staff->spouse->job}}" name="spouse[job]"
                                       placeholder="មុខរបរ">
                            </div>
                            <div class="field">
                                <label>អង្គភាព</label>
                                <input type="text" value="{{$staff->spouse->company}}" name="spouse[company]"
                                       placeholder="អង្គភាព">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        កូន
                    </td>
                    <td>
                        <div class="ui segment">
                            <div id="child_el" class="four fields m-0">
                                <div class="field">
                                    <input class="clear_able" id="child_name" type="text"
                                           name="children[0][name]" placeholder="ឈ្មោះ">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="family_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="clear_able" id="child_dob" type="text"
                                                   name="children[0][dob]" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <input class="clear_able" id="child_job" type="text"
                                           name="children[0][job]" placeholder="មុខរបរ">
                                </div>
                                <div class="field">
                                    <span class="ui positive button" id="add-child"><i class="add icon"></i>បន្ថែម</span>
                                </div>
                            </div>
                            <table id="children_list"
                                   class="ui compact selectable striped celled table tablet stackable">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>នាមត្រកូល-នាមខ្លួន</th>
                                    <th>ថ្ងៃខែឆ្នាំ</th>
                                    <th>មុខរបរ</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ឪពុក</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->father->name}}" name="father[name]"
                                       placeholder="ឈ្មោះ">
                            </div>
                            <div class="field">
                                <div class="ui calendar" id="family_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->father->dob}}" name="father[dob]"
                                               placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <input type="text" value="{{$staff->father->job}}" name="father[job]"
                                       placeholder="មុខរបរ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ម្តាយ</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <input type="text" value="{{$staff->mother->name}}" name="mother[name]"
                                       placeholder="ឈ្មោះ">
                            </div>
                            <div class="field">
                                <div class="ui calendar" id="family_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" value="{{$staff->mother->dob}}" name="mother[dob]"
                                               placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <input type="text" value="{{$staff->mother->job}}" name="mother[job]"
                                       placeholder="មុខរបរ">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="ui segment">
            <h3 class="ui dividing header">ព្រួរពាក្យ ឫសំុអនុញ្ញាតច្បាប់</h3>
            <table class="ui fluid celled table">
                <tbody>
                <tr>
                    <td class="right aligned four wide column">
                        ព្យួរពាក្យ
                    </td>
                    <td class="twelve wide column">
                        <div class="ui segment">
                            <div class="ui inverted relaxDimmer dimmer"></div>
                            <div class="four fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input popupHover" id="lfm" data-input="thumbnail_relax" data-preview="relax_holder" data-content="ភ្ជាប់ឯកសារ" data-variation="larg">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_relax" value="{{$staff->relax->attachment}}" class="relax_nan_able" type="text" name="relax[attachment]">
                                    </div>
                                    <img id="relax_holder" src="{{asset($staff->relax->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="single_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{$staff->relax->formatDate($staff->relax->attachment_date)}}" name="relax[attachment_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំលិខិតអនុញ្ញាត">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <div class="ui calendar" id="relax_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{$staff->relax->formatDate($staff->relax->from_date)}}" name="relax[start_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="relax_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{$staff->relax->formatDate($staff->relax->to_date)}}" name="relax[end_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned four wide column">
                        សំុច្បាប់បន្តការសិក្សា
                    </td>
                    <td class="twelve wide column">
                        <div class="ui segment">
                            <div class="ui inverted contiStudyDimmer dimmer"></div>
                            <div class="four fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input popupHover" id="lfm" data-input="thumbnail_contiStudy" data-preview="contiStudy_holder" data-content="ភ្ជាប់ឯកសារ" data-variation="larg">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_contiStudy" value="{{$staff->continue_studying->attachment}}" class="contiStudy_nan_able" type="text" name="contiStudy[attachment]">
                                    </div>
                                    <img id="contiStudy_holder" src="{{asset($staff->continue_studying->attachment)}}" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="single_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="contiStudy_nan_able" value="{{$staff->continue_studying->attachment_date}}" name="contiStudy[attachment_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំលិខិតអនុញ្ញាត">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <div class="ui calendar" id="contiStudy_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="contiStudy_nan_able" value="{{$staff->continue_studying->formatDate($staff->continue_studying->from_date)}}" name="contiStudy[start_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="contiStudy_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="contiStudy_nan_able" value="{{$staff->continue_studying->formatDate($staff->continue_studying->to_date)}}" name="contiStudy[end_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="ui segment">
            <button class="ui positive button"><i class="edit icon"></i>កែប្រែ</button>
            <div class="ui error message"></div>
        </div>
        {{Form::close()}}
    </div>
@stop
@section('js')
    <script>
        $(function () {
            //UIController
            let UIController = (function () {
                let DOMStrings = {
                    provinceId: '#province',
                    districtId: '#district',
                    communeId: '#commune',
                    villageId: '#village',
                    _provinceId: '#province1',
                    _districtId: '#district1',
                    _communeId: '#commune1',
                    _villageId: '#village1',
                };
                return {
                    getDomString: function () {
                        return DOMStrings;
                    }
                }
            })();
            let Controller = (function (UICtrl) {
                let DOM = UICtrl.getDomString();
                let setupEventListener = function () {
                    let singleDate = document.querySelectorAll('#single_date');
                    $.each(singleDate,function (index,value) {
                        new DatePicker(value,'date')._singlePicker();
                    });
                    let relax_min_max = new MinMaxCalendar('#relax_start','#relax_end',12);
                    relax_min_max._picker(function (date, text, mode) {
                        relax_min_max.now = date;
                        for (let i = 1;i<=relax_min_max.limit_month;i++){
                            relax_min_max.days += new Date(relax_min_max.now.getFullYear(),relax_min_max.now.getMonth()+i,0).getDate();
                        }
                        $(relax_min_max.end_date).calendar({
                            type: 'date',
                            startCalendar: $(relax_min_max.start_date),
                            maxDate: new Date(relax_min_max.now.getFullYear(), relax_min_max.now.getMonth(), relax_min_max.now.getDate() + relax_min_max.days)
                        });
                    },);
                    // contiStudy
                    let contiStudy_min_max = new MinMaxCalendar('#contiStudy_start','#contiStudy_end',48);
                    contiStudy_min_max._picker(function (date, text, mode) {
                        contiStudy_min_max.now = date;
                        for (let i = 1;i<=contiStudy_min_max.limit_month;i++){
                            contiStudy_min_max.days += new Date(contiStudy_min_max.now.getFullYear(),contiStudy_min_max.now.getMonth()+i,0).getDate();
                        }
                        $(contiStudy_min_max.end_date).calendar({
                            type: 'date',
                            startCalendar: $(contiStudy_min_max.start_date),
                            maxDate: new Date(contiStudy_min_max.now.getFullYear(), contiStudy_min_max.now.getMonth(), contiStudy_min_max.now.getDate() + contiStudy_min_max.days)
                        });
                    });
                    $('.isRelax').checkbox().first().checkbox({
                        onChecked: function () {
                            $('.relaxDimmer').toggleClass('active');
                            let relaxNanAble = document.querySelectorAll('.relax_nan_able');
                            $.each(relaxNanAble, function (index, el) {
                                $(el).val('');
                            })
                        },
                        onUnchecked: function () {
                            $('.relaxDimmer').toggleClass('active');
                            let relaxNanAble = document.querySelectorAll('.relax_nan_able');
                            $.each(relaxNanAble, function (index, el) {
                                $(el).val('NaN');
                            })
                        },
                    });
                    $('.isContiStudy').checkbox().first().checkbox({
                        onChecked: function () {
                            $('.contiStudyDimmer').toggleClass('active');
                            let contiStudyNanAble = document.querySelectorAll('.contiStudy_nan_able');
                            $.each(contiStudyNanAble, function (index, el) {
                                $(el).val('');
                            })
                        },
                        onUnchecked: function () {
                            $('.contiStudyDimmer').toggleClass('active');
                            let contiStudyNanAble = document.querySelectorAll('.contiStudy_nan_able');
                            $.each(contiStudyNanAble, function (index, el) {
                                $(el).val('NaN');
                            })
                        },
                    });
                    /*init ajax setup*/
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    /*Family Date*/
                    let initFamilyDate = function () {
                        let family_ids = document.querySelectorAll('#family_date');
                        $.each(family_ids, function (index, el) {
                            new DatePicker(el, 'date', false, true, false, null, null)._picker();
                        });
                    };
                    // init place of birth
                    let pobDefault = new DefaultValue(true, '{{$staff->pob_province[0]->id}}', '{{$staff->pob_district[0]->id}}', '{{$staff->pob_commune[0]->id}}', '{{$staff->pob_village[0]->id}}', '{{$staff->pob_province[0]->name}}', '{{$staff->pob_district[0]->name}}', '{{$staff->pob_commune[0]->name}}', '{{$staff->pob_village[0]->name}}');
                    let url = '{{route('provinces.json')}}';
                    let province = new RemoteSelect(DOM.provinceId, url, false, null, pobDefault.isDefault, pobDefault.province_id, pobDefault.provinceText);
                    province._selection(function (val) {
                        let _val = parseInt(val);
                        let url = '{{route('districts.json',':id')}}';
                        url = url.replace(':id', '');
                        let district = new RemoteSelect(DOM.districtId, url, true, _val, pobDefault.isDefault, pobDefault.district_id, pobDefault.districtText);
                        district._selection(function (val) {
                            let _val = parseInt(val);
                            let url = '{{route('communes.json',':id')}}';
                            url = url.replace(':id', '');
                            let commune = new RemoteSelect(DOM.communeId, url, true, _val, pobDefault.isDefault, pobDefault.commune_id, pobDefault.communeText);
                            commune._selection(function (val) {
                                let _val = parseInt(val);
                                let url = '{{route('villages.json',':id')}}';
                                url = url.replace(':id', '');
                                let commune = new RemoteSelect(DOM.villageId, url, true, _val, pobDefault.isDefault, pobDefault.village_id, pobDefault.villageText);
                                commune._selection(function (val) {
                                    // console.log(val)
                                })
                            })
                        })
                    });
                    /*Current Address*/
                    let _pobDefault = new DefaultValue(true, '{{$staff->province[0]->id}}', '{{$staff->district[0]->id}}', '{{$staff->commune[0]->id}}', '{{$staff->village[0]->id}}', '{{$staff->province[0]->name}}', '{{$staff->district[0]->name}}', '{{$staff->commune[0]->name}}', '{{$staff->village[0]->name}}');
                    let _url = '{{route('provinces.json')}}';
                    let _province = new RemoteSelect(DOM._provinceId, _url, false, null, _pobDefault.isDefault, _pobDefault.province_id, _pobDefault.provinceText);
                    _province._selection(function (val) {
                        let _val = parseInt(val);
                        let _url = '{{route('districts.json',':id')}}';
                        _url = _url.replace(':id', '');
                        let _district = new RemoteSelect(DOM._districtId, _url, true, _val, _pobDefault.isDefault, _pobDefault.district_id, _pobDefault.districtText);
                        _district._selection(function (val) {
                            let _val = parseInt(val);
                            let _url = '{{route('communes.json',':id')}}';
                            _url = _url.replace(':id', '');
                            let _commune = new RemoteSelect(DOM._communeId, _url, true, _val, _pobDefault.isDefault, _pobDefault.commune_id, _pobDefault.communeText);
                            _commune._selection(function (val) {
                                let _val = parseInt(val);
                                let _url = '{{route('villages.json',':id')}}';
                                _url = _url.replace(':id', '');
                                let _village = new RemoteSelect(DOM._villageId, _url, true, _val, _pobDefault.isDefault, _pobDefault.village_id, _pobDefault.villageText);
                                _village._selection(function (val) {
                                    // console.log(val)
                                })
                            })
                        })
                    });
                    /*Date of Birth*/
                    new DatePicker('#dob', 'date', false, null, null)._picker();
                    /*Working Step Date*/
                    new DatePicker('#d_step_1', 'date', true, true, false, null, '#d_step_2')._picker();
                    new DatePicker('#d_step_2', 'date', true, false, true, '#d_step_1', '#d_step_3')._picker();
                    new DatePicker('#d_step_3', 'date', true, false, false, '#d_step_2')._picker();
                    initFamilyDate();
                    let edu_ids_start = document.querySelectorAll('#edu_start');
                    let edu_ids_end = document.querySelectorAll('#edu_end');
                    $.each(edu_ids_end, function (index, el) {
                        new DatePicker(edu_ids_start[index], 'date', true, true, false, null, el)._picker();
                        new DatePicker(el, 'date', true, false, false, edu_ids_start[index])._picker();
                    });
                    let i = 1;
                    let children;
                    $("#child_add").click(function () {
                        let children_form = $('#child_el').clone();
                        children_form.find("#child_name").attr('name', 'children[' + i + '][name]');
                        children_form.find("#child_dob").attr('name', 'children[' + i + '][dob]');
                        children_form.find("#child_job").attr('name', 'children[' + i + '][job]');
                        children_form.appendTo('#child_container');
                        i++;
                        initFamilyDate();
                        children = document.querySelectorAll('#child_el').length;
                    });
                    $("#child_remove").click(function () {
                        if (children > 1) {
                            $('#child_el').last().remove();
                            initFamilyDate();
                            children = document.querySelectorAll('#child_el').length;
                        }
                    });
                    $('.ui.form').form({
                        fields: {
                            khmer_name: 'empty',
                            latin_name: 'empty',
                            gov_official_no: 'empty',
                            gender: 'empty',
                            dob: 'empty',
                            skill: 'empty',
                            id_no: 'empty',
                            bank_no: 'empty',
                            last_appointment: 'empty',
                            start_work: 'empty',
                            real_appointment: 'empty',
                            email: 'empty',
                            phone: 'empty',
                            'pob[province]': 'empty',
                            'pob[district]': 'empty',
                            'pob[commune]': 'empty',
                            'pob[village]': 'empty',
                            'curr[province]': 'empty',
                            'curr[district]': 'empty',
                            'curr[commune]': 'empty',
                            'curr[village]': 'empty',
                            'bachelor[specialty]': 'empty',
                            'bachelor[po_educated]': 'empty',
                            'bachelor[start_date]': 'empty',
                            'bachelor[end_date]': 'empty',
                            'master[specialty]': 'empty',
                            'master[po_educated]': 'empty',
                            'master[start_date]': 'empty',
                            'master[end_date]': 'empty',
                            'spouse[name]': 'empty',
                            'spouse[dob]': 'empty',
                            'spouse[job]': 'empty',
                            'father[name]': 'empty',
                            'father[dob]': 'empty',
                            'father[job]': 'empty',
                            'mother[name]': 'empty',
                            'mother[dob]': 'empty',
                            'mother[job]': 'empty',
                        }
                    });
                    let staff_id = '{{$staff->id}}';
                    staff_id = parseInt(staff_id);
                    let staff_url = '{{route('staff.children',':id')}}';
                    staff_url = staff_url.replace(':id', staff_id);
                    let children_table = $('#children_list').DataTable({
                        destroy: true,
                        processing: true,
                        serverSide: true,
                        deferRender: true,
                        paging: false,
                        searching: false,
                        ajax: {
                            url: staff_url,
                            method: 'POST'
                        },
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'name', name: 'name'},
                            {data: 'dob', name: 'dob'},
                            {data: 'job', name: 'job'},
                            {data: 'action', name: 'action'}

                        ]
                    });
                    let child_url = '{{route('staff-add.children',':id')}}';
                    child_url = child_url.replace(':id', staff_id);
                    $('#add-child').click(function () {
                        $.ajax({
                            type:'post',
                            url:child_url,
                            data:{
                                '_token':'{{csrf_token()}}',
                                'child_name':$('#child_name').val(),
                                'child_dob':$('#child_dob').val(),
                                'child_job':$('#child_job').val(),
                            },
                            success: function (data) {
                                console.log(data);
                                children_table.ajax.reload(null, false);
                                new ClearField('.clear_able').clear_field();
                            }
                        })
                    });
                };
                return {
                    init: function () {
                        console.log('Application is started');
                        setupEventListener();
                    }
                }
            })(UIController);
            Controller.init();
            let imgPicker = document.querySelectorAll('#lfm');
            $.each(imgPicker, function (index, value) {
                $(value).filemanager('file');
            })
        });
    </script>
@stop
@push('css')
    <link href="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.css')}}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboard/js/app_class.js')}}"></script>
@endpush
