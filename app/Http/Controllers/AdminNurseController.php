<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\AdminNurseModel;
use App\Http\Requests\AdminNurseRequest;
class AdminNurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nur_data=AdminNurseModel::all()->where('admin','nurse');
        return view('admin.nurse',compact('nur_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdminNurseRequest $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin'=>'nurse',
        ]);
        AdminNurseModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'contact_no' => $data['contact_no'],
            'admin'=>'nurse',
        ]);

        return redirect()->back();//route('admin_doctor_show.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminNurseRequest $request)
    {
        //
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
    public function edit( $id)
    {
        $admin_nurse_show = AdminNurseModel::find($id);
        return view('admin.edit_nurse',compact('admin_nurse_show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminNurseRequest $request, AdminNurseModel $admin_nurse_show)
    {
          // echo "update called";
          $admin_nurse_show->update($request->all());
          return redirect()->route('admin_nurse_show.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_nurse_show = AdminNurseModel::find($id);
        $admin_nurse_show->delete();
        return redirect()->back();
    }
}
