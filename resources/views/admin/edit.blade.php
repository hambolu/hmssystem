@extends('master')
@section('masterfile')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-9">
         <form action="/admin/{{ $adminurl->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $adminurl->name }}">
            </div>
            <div class="form-group ">
                <label for="">Profile</label>
                <select name="admin" id="" class="form-control" >
                    <option value="0" selected disabled>Select Profile</option>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>
                    <option value="accountant">Accountant</option>
                    <option value="nurse">Nurse</option>
                    <option value="labtech">Labtech</option>
                    <option value="phamarcy">Phamarcy</option>
                    <option value="frontdesk">Front Desk</option>
                <select>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $adminurl->email }}">
            </div>
            <div class="form-group">
                <label for="">Profile</label>
                <input type="text" class="form-control" name="admin" id="admin" value="{{ $adminurl->admin }}">
            </div>
            
            <input type="submit" class="'btn btn-primary" value="Save Employee Data">
        </form>


{{-- <div class="form-group">
{!! Form::label('Name') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('Email') !!}
{!! Form::email('email',null,['class'=>'form-control']) !!}
</div> --}}
<!-- <div class="form-group">
{{-- {!! Form::label('Profile') !!}
{!! Form::text('admin',null,['class'=>'form-control']) !!}
</div> -->
<div class="form-group">
{!! Form::button('Save Employee Data',['type'=>'submit','class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!} --}}
</div>

</div>
</div>


@endsection