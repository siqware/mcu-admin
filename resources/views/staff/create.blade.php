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
        <div class="active section">បង្កើតថ្មី</div>
    </div>
@stop
@section('content')
    <div class="ui grid">
        {{Form::open(['url'=>route('staff.store'),'method'=>'post','class'=>'ui form sixteen wide column'])}}
        <div class="ui segment">
            <h3 class="ui dividing header">ពត៌មានទូទៅ</h3>
            <table class="ui fluid celled table">
                <tbody>
                <tr>
                    <td class="four wide column right aligned">រូបភាពប្រូហ្វាល</td>
                    <td class="twelve wide column">
                        <div class="ui input popupHover" id="lfm" data-input="profile" data-preview="profile_holder" data-content="ដាក់រូបភាព" data-variation="larg">
                            <div class="ui button">
                                <img id="profile_holder" src="{{asset('/files/1/placholder.png')}}"
                                     style="margin-top:15px;max-height:100px;">
                            </div>
                            <input id="profile" type="hidden" value="/files/1/placholder.png" name="profile_picture">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="four wide column right aligned">នាមត្រកូល-នាមខ្លួន</td>
                    <td class="twelve wide column">
                        <div class="two fields m-0">
                            <div class="field">
                                <input type="text" name="khmer_name" placeholder="អក្សរខ្មែរ">
                            </div>
                            <div class="field">
                                <input type="text" name="latin_name" placeholder="អក្សរឡាតាំង">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">អត្តលេខមន្ត្រីរាជការ</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" name="gov_official_no" placeholder="អត្តលេខមន្ត្រីរាជការ">
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
                                    <input name="gender" type="hidden" placeholder="ភេទ">
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
                                        <input type="text" name="dob" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
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
                                <input type="text" name="skill" placeholder="ឯកទេស(អប់រំ)">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">លេខអត្តសញ្ញាណប័ណ្</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" name="id_no" placeholder="លេខអត្តសញ្ញាណប័ណ្">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">លេខគណនីធនាគារ</td>
                    <td>
                        <div class="one fields m-0">
                            <div class="field">
                                <input type="text" name="bank_no" placeholder="លេខគណនីធនាគារ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned"></td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <label>ចូលបម្រើការងាររដ្ឋ</label>
                                <div class="ui calendar" id="d_step_1">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="start_work" placeholder="ចូលបម្រើការងាររដ្ឋ">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>តែងតាំងស៊ប់</label>
                                <div class="ui calendar" id="d_step_2">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="real_appointment" placeholder="តែងតាំងស៊ប់">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>ដំឡើងថ្នាក់ចុងក្រោយ</label>
                                <div class="ui calendar" id="d_step_3">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="last_appointment" placeholder="ដំឡើងថ្នាក់ចុងក្រោយ">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>ប្រភេទកាំប្រាក់</label>
                                <div class="ui selection dropdown" tabindex="0">
                                    <input name="salary_position" type="hidden" placeholder="ប្រភេទកាំប្រាក់">
                                    <div class="default text">ប្រភេទកាំប្រាក់</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                        <div class="item" data-value="ក១.១">ក១.១</div>
                                        <div class="item" data-value="ក១.២">ក១.២</div>
                                        <div class="item" data-value="ក១.៣">ក១.៣</div>
                                        <div class="item" data-value="ក១.៤">ក១.៤</div>
                                        <div class="item" data-value="ក១.៥">ក១.៥</div>
                                        <div class="item" data-value="ក១.៦">ក១.៦</div>

                                        <div class="item" data-value="ក២.១">ក២.១</div>
                                        <div class="item" data-value="ក២.២">ក២.២</div>
                                        <div class="item" data-value="ក២.៣">ក២.៣</div>
                                        <div class="item" data-value="ក២.៤">ក២.៤</div>

                                        <div class="item" data-value="ក៣.១">ក៣.១</div>
                                        <div class="item" data-value="ក៣.២">ក៣.២</div>
                                        <div class="item" data-value="ក៣.៣">ក៣.៣</div>
                                        <div class="item" data-value="ក៣.៤">ក៣.៤</div>

                                        <div class="item" data-value="ខ១.១">ខ១.១</div>
                                        <div class="item" data-value="ខ១.២">ខ១.២</div>
                                        <div class="item" data-value="ខ១.៣">ខ១.៣</div>
                                        <div class="item" data-value="ខ១.៤">ខ១.៤</div>
                                        <div class="item" data-value="ខ១.៥">ខ១.៥</div>
                                        <div class="item" data-value="ខ១.៦">ខ១.៦</div>

                                        <div class="item" data-value="ខ២.១">ខ២.១</div>
                                        <div class="item" data-value="ខ២.២">ខ២.២</div>
                                        <div class="item" data-value="ខ២.៣">ខ២.៣</div>
                                        <div class="item" data-value="ខ២.៤">ខ២.៤</div>

                                        <div class="item" data-value="ខ៣.១">ខ៣.១</div>
                                        <div class="item" data-value="ខ៣.២">ខ៣.២</div>
                                        <div class="item" data-value="ខ៣.៣">ខ៣.៣</div>
                                        <div class="item" data-value="ខ៣.៤">ខ៣.៤</div>
                                        <div class="item" data-value="ខ៣.៥">ខ៣.៥</div>
                                        <div class="item" data-value="ខ៣.៦">ខ៣.៦</div>

                                        <div class="item" data-value="គ១.១">គ១.១</div>
                                        <div class="item" data-value="គ១.២">គ១.២</div>
                                        <div class="item" data-value="គ១.៣">គ១.៣</div>
                                        <div class="item" data-value="គ១.៤">គ១.៤</div>
                                        <div class="item" data-value="គ១.៥">គ១.៥</div>
                                        <div class="item" data-value="គ១.៦">គ១.៦</div>
                                        <div class="item" data-value="គ១.៧">គ១.៧</div>
                                        <div class="item" data-value="គ១.៨">គ១.៨</div>
                                        <div class="item" data-value="គ១.៩">គ១.៩</div>
                                        <div class="item" data-value="គ១.១០">គ១.១០</div>
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
                                <input type="email" name="email" placeholder="អ៊ីម៉ែ់ល">
                            </div>
                            <div class="field">
                                <input type="text" name="phone" placeholder="លេខទូរស័ព្ទ">
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
                                    <input type="text" name="bachelor[specialty]" placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <label>ទីកន្លែងបណ្តុះបណ្តាល</label>
                                    <input type="text" name="bachelor[po_educated]" placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <label>ថ្ងៃខែឆ្នាំចាប់ផ្តើម</label>
                                    <div class="ui calendar bachelor" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="bachelor[start_date]"
                                                   placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>ថ្ងៃខែឆ្នាំបញ្ចប់</label>
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="bachelor[end_date]"
                                                   placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input popupHover" id="lfm" data-input="thumbnail_bachelor" data-preview="bachelor_holder" data-content="ភ្ជាប់ឯកសារ" data-variation="larg">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_bachelor" type="text" name="bachelor[attachment]">
                                    </div>
                                    <img id="bachelor_holder" style="margin-top:15px;max-height:100px;">
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
                                    <input type="text" name="master[specialty]" placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <input type="text" name="master[po_educated]" placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="master[start_date]"
                                                   placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="master[end_date]" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input popupHover" id="lfm" data-input="thumbnail_master" data-preview="master_holder" data-content="ភ្ជាប់ឯកសារ" data-variation="larg">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_master" type="text" name="master[attachment]">
                                    </div>
                                    <img id="master_holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" checked="checked">
                            <label>សញ្ញាបត្របណ្ឌិត</label>
                        </div>
                    </td>
                    <td>
                        <div class="ui segment">
                            <div class="ui inverted doctorDimmer dimmer"></div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <input class="doctor_nan_able" name="doctor[specialty]" type="text"
                                           placeholder="ឯកទេស">
                                </div>
                                <div class="field">
                                    <input class="doctor_nan_able" name="doctor[po_educated]" type="text"
                                           placeholder="ទីកន្លែងបណ្តុះបណ្តាល">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input value="{{\Carbon\Carbon::now()}}" name="doctor[start_date]" type="text"
                                                   placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="edu_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input value="{{\Carbon\Carbon::now()}}" name="doctor[end_date]" type="text"
                                                   placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one fields mt-2 mx-0">
                                <div class="field">
                                    <div class="ui left action input popupHover" id="lfm" data-input="thumbnail_doctor" data-preview="doctor_holder" data-content="ភ្ជាប់ឯកសារ" data-variation="larg">
                                        <span class="ui teal button">
                                            <i class="paperclip icon"></i>
                                        </span>
                                        <input id="thumbnail_doctor" class="doctor_nan_able" type="text" name="doctor[attachment]">
                                    </div>
                                    <img id="doctor_holder" style="margin-top:15px;max-height:100px;">
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
                    <td class="four wide column right aligned">
                        <div class="ui toggle isSpouse checkbox">
                            <input type="checkbox" checked="checked">
                            <label>មានប្តី ឬ ប្រពន្ធដែរ ឫទេ?</label>
                        </div>
                    </td>
                    <td class="twelve wide column">
                        <div class="ui segment">
                            <div class="ui inverted dimmer spouseDimmer"></div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <label>ឈ្មោះ</label>
                                    <input type="text" class="spouse_nan_able" name="spouse[name]" placeholder="ឈ្មោះ">
                                </div>
                                <div class="field">
                                    <label>ថ្ងៃខែឆ្នាំកំណើត</label>
                                    <div class="ui calendar" id="family_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" value="{{\Carbon\Carbon::now()}}" name="spouse[dob]"
                                                   placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>មុខរបរ</label>
                                    <input type="text" class="spouse_nan_able" name="spouse[job]" placeholder="មុខរបរ">
                                </div>
                                <div class="field">
                                    <label>អង្គភាព</label>
                                    <input type="text" class="spouse_nan_able" name="spouse[company]"
                                           placeholder="អង្គភាព">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <div class="ui toggle isChild checkbox">
                            <input type="checkbox" checked="checked">
                            <label>មានកូនដែរ ឫទេ?</label>
                        </div>
                        <i id="child_add" class="circular olive add icon link popupHover" data-content="បន្ថែមចំនួនកូន"
                           data-variation="mini"></i>
                        <i id="child_remove" class="circular pink remove icon link popupHover"
                           data-content="លុបចំនួនកូន"
                           data-variation="mini"></i>
                    </td>
                    <td>
                        <div class="ui segment" id="child_container">
                            <div class="ui inverted dimmer childDimmer"></div>
                            <div id="child_el" class="four fields my-1">
                                <div class="field">
                                    <input class="child_nan_able" id="child_name" type="text" name="children[0][name]" placeholder="ឈ្មោះ">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="family_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input id="child_dob" type="text" value="{{\Carbon\Carbon::now()}}"
                                                   name="children[0][dob]" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <input class="child_nan_able" id="child_job" type="text"
                                           name="children[0][job]" placeholder="មុខរបរ">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ឪពុក</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <input type="text" name="father[name]" placeholder="ឈ្មោះ">
                            </div>
                            <div class="field">
                                <div class="ui calendar" id="family_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="father[dob]" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <input type="text" name="father[job]" placeholder="មុខរបរ">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">ម្តាយ</td>
                    <td>
                        <div class="four fields m-0">
                            <div class="field">
                                <input type="text" name="mother[name]" placeholder="ឈ្មោះ">
                            </div>
                            <div class="field">
                                <div class="ui calendar" id="family_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="mother[dob]" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <input type="text" name="mother[job]" placeholder="មុខរបរ">
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
                        <div class="ui toggle checkbox isRelax">
                            <input type="checkbox" checked="checked">
                            <label>ព្យួរពាក្យ?</label>
                        </div>
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
                                        <input id="thumbnail_relax" value="na" class="relax_nan_able" type="text" name="relax[attachment]">
                                    </div>
                                    <img id="relax_holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="single_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{\Carbon\Carbon::now()}}" name="relax[attachment_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំលិខិតអនុញ្ញាត">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <div class="ui calendar" id="relax_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{\Carbon\Carbon::now()}}" name="relax[start_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="relax_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input class="relax_nan_able" value="{{\Carbon\Carbon::now()}}" name="relax[end_date]" type="text" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="right aligned four wide column">
                        <div class="ui toggle checkbox isContiStudy">
                            <input type="checkbox" checked="checked">
                            <label>សំុច្បាប់បន្តការសិក្សា?</label>
                        </div>
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
                                        <input id="thumbnail_contiStudy" value="na" type="text" name="contiStudy[attachment]">
                                    </div>
                                    <img id="contiStudy_holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="single_date">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input name="contiStudy[attachment_date]" value="{{\Carbon\Carbon::now()}}" type="text" placeholder="ថ្ងៃខែឆ្នាំលិខិតអនុញ្ញាត">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four fields m-0">
                                <div class="field">
                                    <div class="ui calendar" id="contiStudy_start">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input name="contiStudy[start_date]" value="{{\Carbon\Carbon::now()}}" type="text" placeholder="ថ្ងៃខែឆ្នាំចាប់ផ្តើម">
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui calendar" id="contiStudy_end">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input name="contiStudy[end_date]" value="{{\Carbon\Carbon::now()}}" type="text" placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់">
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
            <button class="ui positive button"><i class="save icon"></i>រក្សារទុក</button>
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
                            'doctor[specialty]': 'empty',
                            'doctor[po_educated]': 'empty',
                            'doctor[start_date]': 'empty',
                            'doctor[end_date]': 'empty',
                            'spouse[name]': 'empty',
                            'spouse[dob]': 'empty',
                            'spouse[job]': 'empty',
                            'children[0][name]': 'empty',
                            'children[0][dob]': 'empty',
                            'children[0][job]': 'empty',
                            'father[name]': 'empty',
                            'father[dob]': 'empty',
                            'father[job]': 'empty',
                            'mother[name]': 'empty',
                            'mother[dob]': 'empty',
                            'mother[job]': 'empty',
                            'bachelor[attachment]': 'empty',
                            'master[attachment]': 'empty',
                            'doctor[attachment]': 'empty',
                        }
                    });
                    $('input[name="latin_name"]').keyup(function () {
                        $(this).val($(this).val().toUpperCase());
                    });
                    let imgPicker = document.querySelectorAll('#lfm');
                    $.each(imgPicker, function (index, value) {
                        $(value).filemanager('file');
                    });
                    /*Family Date*/
                    let initFamilyDate = function () {
                        let family_ids = document.querySelectorAll('#family_date');
                        $.each(family_ids, function (index, el) {
                            new DatePicker(el, 'date', false, true, false, null, null)._picker();
                        });
                    };
                    // init place of birth
                    let pobDefault = new DefaultValue(true, 17, 1711, 171109, 17110907, 'Siem Reap', 'Sotr Nikum', 'Samrong', 'Svay Chrum');
                    pobDefault.setEmpty();
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
                    let _pobDefault = new DefaultValue(true, 17, 1711, 171109, 17110907, 'Siem Reap', 'Sotr Nikum', 'Samrong', 'Svay Chrum');
                    _pobDefault.setEmpty();
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
                    /*init popup*/
                    let popupClasses = document.querySelectorAll('.popupHover');
                    $.each(popupClasses, function (index, el) {
                        $(el).popup();
                    });
                    /*Add Event listener for switch toggle*/
                    $('.checkbox').checkbox().first().checkbox({
                        onChecked: function () {
                            $('.doctorDimmer').toggleClass('active');
                            let doctorNanAble = document.querySelectorAll('.doctor_nan_able');
                            $.each(doctorNanAble, function (index, el) {
                                $(el).val('');
                            })
                        },
                        onUnchecked: function () {
                            $('.doctorDimmer').toggleClass('active');
                            let doctorNanAble = document.querySelectorAll('.doctor_nan_able');
                            $.each(doctorNanAble, function (index, el) {
                                $(el).val('NaN');
                            })
                        },
                    });
                    $('.isChild').checkbox().first().checkbox({
                        onChecked: function () {
                            $('.childDimmer').toggleClass('active');
                            let childNanAble = document.querySelectorAll('.child_nan_able');
                            $.each(childNanAble, function (index, el) {
                                $(el).val('');
                            })
                        },
                        onUnchecked: function () {
                            $('.childDimmer').toggleClass('active');
                            let childNanAble = document.querySelectorAll('.child_nan_able');
                            $.each(childNanAble, function (index, el) {
                                $(el).val('NaN');
                            })
                        },
                    });
                    $('.isSpouse').checkbox().first().checkbox({
                        onChecked: function () {
                            $('.spouseDimmer').toggleClass('active');
                            let spouseNanAble = document.querySelectorAll('.spouse_nan_able');
                            $.each(spouseNanAble, function (index, el) {
                                $(el).val('');
                            })
                        },
                        onUnchecked: function () {
                            $('.spouseDimmer').toggleClass('active');
                            let spouseNanAble = document.querySelectorAll('.spouse_nan_able');
                            $.each(spouseNanAble, function (index, el) {
                                $(el).val('NaN');
                            })
                        },
                    });
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
                };
                return {
                    init: function () {
                        console.log('Application is started');
                        setupEventListener();
                    }
                }
            })(UIController);
            Controller.init();
            $('.isRelax').checkbox().first().checkbox({
                onChecked: function () {
                    $('.relaxDimmer').toggleClass('active');
                },
                onUnchecked: function () {
                    $('.relaxDimmer').toggleClass('active');
                },
            });
            $('.isContiStudy').checkbox().first().checkbox({
                onChecked: function () {
                    $('.contiStudyDimmer').toggleClass('active');
                },
                onUnchecked: function () {
                    $('.contiStudyDimmer').toggleClass('active');
                },
            });
        });
    </script>
@stop
@push('css')
    <link href="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.css')}}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{asset('dashboard/plugins/Semantic-UI-Calendar-master/dist/calendar.min.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="{{asset('dashboard/js/app_class.js')}}"></script>
@endpush
