<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bachelor;
use App\Child;
use App\Relax;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    public function export_staff_json(){
        $staff = Staff::with(['bachelor','master','doctor','spouse','children','father','mother']);
        return Datatables::of($staff)
            ->addColumn('pob_address',function ($pob_addr){
                return $pob_addr->pob_village[0]->name.', '.$pob_addr->pob_commune[0]->name.', '.$pob_addr->pob_district[0]->name.', '.$pob_addr->pob_province[0]->name;
            })
            ->addColumn('curr_address',function ($curr_addr){
                return $curr_addr->village[0]->name.', '.$curr_addr->commune[0]->name.', '.$curr_addr->district[0]->name.', '.$curr_addr->province[0]->name;
            })
            ->rawColumns(['pob_address','curr_address'])
            ->toJson();
    }
    public function export_staff(){
        return view('staff.export');
    }
    public function add_child(Request $request,$id){
        $staff = Staff::findOrFail($id);
        $input = $request->all();
        $staff->children()->create([
            'name' => $input['child_name'],
            'dob' => $input['child_dob'],
            'job' => $input['child_job'],
        ]);
    }
    public function child_delete($id){
        $child = Child::findOrFail($id)->delete();
        if ($child){
            return redirect()->back();
        }
    }
    public function children_json($id){
        $children = Staff::findOrFail($id)->children;
        return Datatables::of($children)
            ->addColumn('action', function ($child) {
                return '
                <form action="'.route('child.delete',$child->id).'" method="post"> <input type="hidden" name="_token" value="'.csrf_token().'"><button class="ui mini button pink m-0 p-2"><i class="remove icon submit"></i></button></form>
                ';
            })
            ->toJson();
    }
    public function staff_json_view()
    {
        $staff = Staff::all();
        return Datatables::of($staff)
            ->addColumn('action', function ($staff) {
                return '<form method="post" action="'.route('staff.destroy',$staff->id).'">
<div class="ui buttons m-0">
'.csrf_field().method_field('delete').'
<a href="' . route('staff.show', $staff->id) . '" class="mini ui button px-2 olive"><i class="eye icon"></i></a>
<a href="' . route('staff.edit', $staff->id) . '" class="mini ui button px-2 green"><i class="edit icon"></i></a>
<button class="mini ui button px-2 pink"><i class="remove icon"></i></button>
</div>
</form>';
            })
            ->addColumn('profile_picture', function ($staff) {
                return '<img class="ui avatar image" src="'.asset($staff->profile_picture).'" alt="">';
            })
            ->rawColumns(['action','profile_picture'])
            ->toJson();
    }

    public function staff_json_export()
    {
        $staff = Staff::with(['bachelor', 'master']);
        return Datatables::of($staff)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function formatDate($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $generalInfo = new Staff();
        $generalInfo->profile_picture = $input['profile_picture'];
        $generalInfo->gov_official_no = $input['gov_official_no'];
        $generalInfo->khmer_name = $input['khmer_name'];
        $generalInfo->salary_position = $input['salary_position'];
        $generalInfo->latin_name = $input['latin_name'];
        $generalInfo->gender = $input['gender'];
        $generalInfo->dob = $input['dob'];
        $generalInfo->id_no = $input['id_no'];
        $generalInfo->bank_acc_no = $input['bank_no'];
        $generalInfo->last_appointment = $input['last_appointment'];
        $generalInfo->start_work = $input['start_work'];
        $generalInfo->real_appoint = $input['real_appointment'];
        $generalInfo->skill = $input['skill'];
        $generalInfo->phone_num = $input['phone'];
        $generalInfo->email = $input['email'];
        $generalInfo->save();
        $generalInfo->pob_address()->create([
            'province_id' => $input['pob']['province'],
            'district_id' => $input['pob']['district'],
            'commune_id' => $input['pob']['commune'],
            'village_id' => $input['pob']['village'],
        ]);
        $generalInfo->curr_address()->create([
            'province_id' => $input['curr']['province'],
            'district_id' => $input['curr']['district'],
            'commune_id' => $input['curr']['commune'],
            'village_id' => $input['curr']['village'],
        ]);
        $generalInfo->bachelor()->create([
            'attachment' => $input['bachelor']['attachment'],
            'specialty' => $input['bachelor']['specialty'],
            'po_educated' => $input['bachelor']['po_educated'],
            'start_date' => $input['bachelor']['start_date'],
            'end_date' => $input['bachelor']['end_date'],
        ]);
        $generalInfo->master()->create([
            'attachment' => $input['master']['attachment'],
            'specialty' => $input['master']['specialty'],
            'po_educated' => $input['master']['po_educated'],
            'start_date' => $input['master']['start_date'],
            'end_date' => $input['master']['end_date'],
        ]);
        $generalInfo->doctor()->create([
            'attachment' => $input['doctor']['attachment'],
            'specialty' => $input['doctor']['specialty'],
            'po_educated' => $input['doctor']['po_educated'],
            'start_date' => $input['doctor']['start_date'],
            'end_date' => $input['doctor']['end_date'],
        ]);
        $generalInfo->spouse()->create([
            'name' => $input['spouse']['name'],
            'dob' => $input['spouse']['dob'],
            'job' => $input['spouse']['job'],
            'company' => $input['spouse']['company'],
        ]);
        $generalInfo->father()->create([
            'name' => $input['father']['name'],
            'dob' => $input['father']['dob'],
            'job' => $input['father']['job'],
        ]);
        $generalInfo->mother()->create([
            'name' => $input['mother']['name'],
            'dob' => $input['mother']['dob'],
            'job' => $input['mother']['job'],
        ]);
        $generalInfo->relax()->create([
            'attachment' => $input['relax']['attachment'],
            'attachment_date' => $this->formatDate($input['relax']['attachment_date']),
            'from_date' => $this->formatDate($input['relax']['start_date']),
            'to_date' => $this->formatDate($input['relax']['end_date']),
            'times' => 1,
        ]);
        $generalInfo->continue_studying()->create([
            'attachment' => $input['contiStudy']['attachment'],
            'attachment_date' => $this->formatDate($input['contiStudy']['attachment_date']),
            'from_date' => $this->formatDate($input['contiStudy']['start_date']),
            'to_date' => $this->formatDate($input['contiStudy']['end_date']),
            'times' => 1,
        ]);
        $children = [];
        foreach ($input['children'] as $child){
            $children[] = [
                'name' => $child['name'],
                'dob' => $child['dob'],
                'job' => $child['job'],
            ];
        }
        $generalInfo->children()->createMany($children);
        if ($generalInfo){
            return redirect(route('staff.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $generalInfo = Staff::findOrFail($id);
        $generalInfo->profile_picture = $input['profile_picture'];
        $generalInfo->gov_official_no = $input['gov_official_no'];
        $generalInfo->khmer_name = $input['khmer_name'];
        $generalInfo->latin_name = $input['latin_name'];
        $generalInfo->salary_position = $input['salary_position'];
        $generalInfo->gender = $input['gender'];
        $generalInfo->dob = $input['dob'];
        $generalInfo->id_no = $input['id_no'];
        $generalInfo->bank_acc_no = $input['bank_no'];
        $generalInfo->last_appointment = $input['last_appointment'];
        $generalInfo->start_work = $input['start_work'];
        $generalInfo->real_appoint = $input['real_appointment'];
        $generalInfo->skill = $input['skill'];
        $generalInfo->phone_num = $input['phone'];
        $generalInfo->email = $input['email'];
        $generalInfo->save();
        $generalInfo->pob_address()->update([
            'province_id' => $input['pob']['province'],
            'district_id' => $input['pob']['district'],
            'commune_id' => $input['pob']['commune'],
            'village_id' => $input['pob']['village'],
        ]);
        $generalInfo->curr_address()->update([
            'province_id' => $input['curr']['province'],
            'district_id' => $input['curr']['district'],
            'commune_id' => $input['curr']['commune'],
            'village_id' => $input['curr']['village'],
        ]);
        $generalInfo->bachelor()->update([
            'attachment' => $input['bachelor']['attachment'],
            'specialty' => $input['bachelor']['specialty'],
            'po_educated' => $input['bachelor']['po_educated'],
            'start_date' => $input['bachelor']['start_date'],
            'end_date' => $input['bachelor']['end_date'],
        ]);
        $generalInfo->master()->update([
            'attachment' => $input['master']['attachment'],
            'specialty' => $input['master']['specialty'],
            'po_educated' => $input['master']['po_educated'],
            'start_date' => $input['master']['start_date'],
            'end_date' => $input['master']['end_date'],
        ]);
        $generalInfo->doctor()->update([
            'attachment' => $input['doctor']['attachment'],
            'specialty' => $input['doctor']['specialty'],
            'po_educated' => $input['doctor']['po_educated'],
            'start_date' => $input['doctor']['start_date'],
            'end_date' => $input['doctor']['end_date'],
        ]);
        $generalInfo->spouse()->update([
            'name' => $input['spouse']['name'],
            'dob' => $input['spouse']['dob'],
            'job' => $input['spouse']['job'],
            'company' => $input['spouse']['company'],
        ]);
        $generalInfo->father()->update([
            'name' => $input['father']['name'],
            'dob' => $input['father']['dob'],
            'job' => $input['father']['job'],
        ]);
        $generalInfo->mother()->update([
            'name' => $input['mother']['name'],
            'dob' => $input['mother']['dob'],
            'job' => $input['mother']['job'],
        ]);
        $generalInfo->relax()->update([
            'attachment' => $input['relax']['attachment'],
            'attachment_date' => $this->formatDate($input['relax']['attachment_date']),
            'from_date' => $this->formatDate($input['relax']['start_date']),
            'to_date' => $this->formatDate($input['relax']['end_date']),
            'times' => 1,
        ]);
        $generalInfo->continue_studying()->update([
            'attachment' => $input['contiStudy']['attachment'],
            'attachment_date' => $this->formatDate($input['contiStudy']['attachment_date']),
            'from_date' => $this->formatDate($input['contiStudy']['start_date']),
            'to_date' => $this->formatDate($input['contiStudy']['end_date']),
            'times' => 1,
        ]);
        return redirect(route('staff.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id)->delete();
        if ($staff){
            return redirect()->back();
        }
    }
}
