<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PatientProfileModel;
use App\Http\Requests\AdminPatientRequest;
class AdminPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pat_data=PatientProfileModel::all()->where('admin','patient');
        return view('admin.patient',compact('pat_data'));
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
            'admin'=>'patient',
        ]);
        PatientProfileModel::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin'=>'patient',
            'gender' => $request['gender'],
            'address' => $request['address'],
            'city' => $request['city'],
            'contact_no' => $request['contact_no'],
            'martial_status' => $request['martial_status'],
            'religion' => $request['religion'],
            'father_husband_name' => $request['father_husband_name'],
            // 'cnic'=>$request['cnic'],
            'birth_year'=>$request['birth_year'],
        ]);
        return view('admin_patient_show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPatientRequest $request)
    {
       
        // return redirect()->route('admin_patient_show.index');
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
        $admin_patient_show = PatientProfileModel::find($id);
        return view('admin.edit_patient',compact('admin_patient_show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
          // echo "update called";
         
          $admin_patient_show = PatientProfileModel::find($id);
          //$admin_patient_show->update($request->all());
          $admin_patient_show->name = $request['name'];
          $admin_patient_show->email = $request['email'];
          $admin_patient_show->password = Hash::make($request['password']);
          $admin_patient_show->admin = 'patient';
          $admin_patient_show->gender = $request['gender'];
          $admin_patient_show->address = $request['address'];
          $admin_patient_show->city = $request['city'];
          $admin_patient_show->contact_no = $request['contact_no'];
          $admin_patient_show->martial_status = $request['martial_status'];
          $admin_patient_show->religion = $request['religion'];
          $admin_patient_show->father_husband_name = $request['father_husband_name'];
            // 'cnic'=>$request['cnic'],
            $admin_patient_show->birth_year = $request['birth_year'];
            $admin_patient_show->save();
          return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $admin_patient_show = PatientProfileModel::find($id);
        $admin_patient_show->delete();
        return redirect()->back();
    }
}
