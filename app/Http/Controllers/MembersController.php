<?php

namespace App\Http\Controllers;

use App\Http\Requests\membersRequest;
use App\Member;
use Carbon\Carbon;
use DB;use Illuminate\Http\Request;
use DateTime;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('members')->orderBy( 'endDate')->get();
        return  view('members.index')->with('members',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(membersRequest $request)
    {
        $year = now()->year; $day = now()->day; $month = now()->month; $hour = now()->hour;; $minute = now()->minute;; $second = now()->second;; $tz = 'Africa/Cairo';
       if($request->day) {
           $day = $request->day;
       }
       if($request->month) {
           $month = $request->month;
       }

        $startDate = Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);
        $endDate = date('Y-m-d H:i:s', strtotime($startDate. ' + 1 months'));

        $data = $request->validate([
            'name'=>'unique:members|required',
            'phone_num'=>'unique:members',
            'day'=>'integer|between:1,30',
            'month'=>'integer|between:1,12'

        ]);
        $member = Member::all();
        $member->startDate = $startDate;
       Member::create([
          'name'=> $data['name'],
          'endDate'=>$endDate,
          'startDate'=>$startDate,
          'phone_num'=>$data['phone_num']


       ]);
        session()->flash('add', 'تم اضافة المشترك  بنجاح');
        return  redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Member::find($id);
        return view('members.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.create',['id'=>$member]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Member::find($id);
        $id->delete();
        session()->flash('destroy', 'تم حذف المستخدم  بنجاح');
        return redirect('members');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $members)
    {
        $request->validate([
            'phone_num'=>'integer',
            'day'=>'integer|between:1,30',
            'month'=>'between:1,12'
        ]);
        $members = Member::find($members);
        $members->name = $request->name;
        $members->phone_num = $request->phone_num;
        session()->flash('update', 'تم تحديث البيانات بنجاح');
        return  redirect('members');
    }

    public  function search(){
        $search  = $_GET['query'];
        $members = Member::all();
        $results = Member::where('name','LIKE','%'.$search.'%')->orderBy('endDate')->get();
        return view('members.index',compact('results'))->with('members',$members);

    }

    public  function renew($id){
        $id = Member::find($id);

        $id->months +=1;
        DB::table('money')->insert([
            'pay' => $id->pay+100,
            'created_at' =>now(),
        ]);
        $startDate = new DateTime( $id->startDate);
        $endDate = new DateTime( $id->endDate);


        $id->startDate = $startDate->modify('+1 months');
        $id->endDate = $endDate->modify('+1 months');
        $id->save();
        session()->flash('successRenew', 'تم تجديد الاشتراك بنجاح');
        return back();
    }
    public function money(){
        $users = Member::all()->count();
        $total = DB::table('money')->sum('pay');
        return view('members.statistics',['users'=>$users])->with('money',$total);
    }

}

