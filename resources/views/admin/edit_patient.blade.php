@extends('master')
@section('masterfile')
<!-- Add new record -->
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin_patient_show/{{ $admin_patient_show->id }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $admin_patient_show->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $admin_patient_show->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ $admin_patient_show->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ $admin_patient_show->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Contact No</label>
                                    <input type="text" class="form-control" name="contact_no" id="contact_no" value="{{ $admin_patient_show->contact_no }}">
                                </div>
                                <div class="form-group ">
                                    <label for="">Martial Status</label>
                                    <select name="martial_status" class="form-control" id="">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Religon</label>
                                    <input type="text" class="form-control" name="religion" id="religion" value="{{ $admin_patient_show->religion }}">
                                </div>
                                <div class="form-group row">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-control" id="">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Father/husband Name</label>
                                    <input type="text" class="form-control" name="father_husband_name" id="father_husband_name" value="{{ $admin_patient_show->father_husband_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ $admin_patient_show->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" name="birth_year" id="birth_year" value="{{ $admin_patient_show->birth_year }}">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                    </button>
                            </form>
                           
                       
            </div>
        </div>
</main>
@endsection