@extends('master')
@section('masterfile')
<!-- Update record -->
<!-- Add new record -->

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin_invoice_show/{{ $admin_invoice_show->id }}" method="post">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">
                                    <label for="patient_name">Patient Name</label>
                                    <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{ $admin_invoice_show->patient_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="doctor_charges">Doctor Charges</label>
                                    <input type="text" class="form-control" id="doctor_charges" name="doctor_charges" value="{{ $admin_invoice_show->doctor_charges }}">
                                </div>
                                <div class="form-group">
                                    <label for="miscellaneous">Miscellaneous</label>
                                    <input type="text" class="form-control" id="miscellaneous" name="miscellaneous" value="{{ $admin_invoice_show->miscellaneous }}">
                                </div>
                                <div class="form-group">
                                    <label for="bed_charges">Bed Charges</label>
                                    <input type="text" class="form-control" id="bed_charges" name="bed_charges" value="{{ $admin_invoice_show->bed_charges }}">
                                </div>
                                <div class="form-group">
                                    <label for="ward_charges">Ward Charges</label>
                                    <input type="text" class="form-control" id="ward_charges" name="ward_charges" value="{{ $admin_invoice_show->ward_charges }}">
                                </div>
                                <div class="form-group">
                                    <label for="others_charges">Other Charges</label>
                                    <input type="text" class="form-control" id="others_charges" name="others_charges" value="{{ $admin_invoice_show->others_charges }}">
                                </div>
                                <div class="form-group">
                                    <label for="confirmation">Payment</label>
                                    <select name="confirmation" id="" class="form-control">
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="Paid">Paid</option>
                                    </select>
                                </div>
                                
                            
                                
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Update
                                        </button>
                                    </div>
                                    
                                    @foreach($errors->all() as $error)
                                    {{$error}}
                                    @endforeach
                                </div>
                            </form>
                            @foreach($errors->all() as $error)
                                    {{$error}}
                                    @endforeach
                        </div>

            </div>
        </div>
    

</main>

@endsection