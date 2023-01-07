<?php

namespace App\Http\Controllers;
use Hash;
use Image;
use App\Models\User;
use App\Models\AdminDoctorModel;
use Illuminate\Http\Request;
//use App\Http\Requests\AdminDoctorRequest;
class AdminDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc_data=AdminDoctorModel::all();
        return view('admin.doctor',compact('doc_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin'=>'doctor',
        ]);

        //    echo $data->file('avatar');
            // $filename=time().".".$avatar->getClientOriginalExtension();
            // Image::make($avatar)->resize(250,250)->save(public_path('/img/'.$filename));



            // $request->validate([
            //         'email'=>'required | unique'
            // ]);

        AdminDoctorModel::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin'=>'doctor',
            'gender' => $request['gender'],
            'department' => $request['department'],
            'specilization' => $request['specilization'],
            'servicecharge' => $request['servicecharge'],
            'permanent_address' => $request['permanent_address'],
            'present_address' => $request['present_address'],
            'phone_number' => $request['phone_number'],
            'dob'=>$request['dob'],
        ]);

       return redirect()->back();//route('admin_doctor_show.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "called";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_doctor_show = AdminDoctorModel::find($id);
        return view('admin.edit_doctor',compact('admin_doctor_show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "update called";
        $admin_doctor_show = AdminDoctorModel::find($id);
        $admin_doctor_show->update($request->all());
        return redirect()->route('admin_doctor_show.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_doctor_show = AdminDoctorModel::find($id);
        $adminurl = User::find($id);
        $adminurl->delete();
        $admin_doctor_show->delete();
        return redirect()->back();
    }
}
