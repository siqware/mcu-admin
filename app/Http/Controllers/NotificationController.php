<?php

namespace App\Http\Controllers;

use App\ContinueStudying;
use App\Relax;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class NotificationController extends Controller
{
    public function relax_notification_count(){
        return Relax::with(['staff'])
            ->where('attachment','<>','NaN')
            ->whereRaw('NOW() >= DATE_ADD(to_date,INTERVAL -2 MONTH)')
            ->where('is_done','=',0)
            ->count();
    }
    public function continue_studying_notification_count(){
        return ContinueStudying::with(['staff'])
            ->where('attachment','<>','NaN')
            ->whereRaw('NOW() >= DATE_ADD(to_date,INTERVAL -2 MONTH)')
            ->where('is_done','=',0)
            ->count();
    }
    public function total_notification_count(){
        return $count = [
            'count' => $this->relax_notification_count()+$this->continue_studying_notification_count(),
        ];
    }
    public function relax_notification(){
        return Relax::with(['staff'])
            ->select(DB::raw('*,(datediff(to_date,NOW())) as message_duration,(DATE_ADD(to_date,INTERVAL 1 DAY)) as expire_date'))
            ->where('attachment','<>','NaN')
            ->whereRaw('NOW() >= DATE_ADD(to_date,INTERVAL -2 MONTH)')
            ->where('is_done','=',0)
            ->get();
    }
    public function continue_studying_notification(){
        return ContinueStudying::with(['staff'])
            ->select(DB::raw('*,(datediff(to_date,NOW())) as message_duration,(DATE_ADD(to_date,INTERVAL 1 DAY)) as expire_date'))
            ->where('attachment','<>','NaN')
            ->whereRaw('NOW() >= DATE_ADD(to_date,INTERVAL -2 MONTH)')
            ->where('is_done','=',0)
            ->get();
    }
    public function index(){
        $conti_studies = $this->continue_studying_notification();
        $relaxes = $this->relax_notification();
        return view('staff.notification',compact(['conti_studies','relaxes']));
    }
    public function update_relax($id){
        $relax = Relax::findOrFail($id);
        $relax->is_done = 1;
        $relax->save();
        if ($relax){
            return redirect()->back();
        }
    }
    public function update_conti_studying($id){
        $conti_studying = ContinueStudying::findOrFail($id);
        $conti_studying->is_done = 1;
        $conti_studying->save();
        if ($conti_studying){
            return redirect()->back();
        }
    }
}
