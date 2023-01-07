@extends('master')
@section('masterfile')
<div class="table-responsive">

    <table id="table-data" class="table table-bordered ">
                    <thead class="thead-light">
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Date of Creation</th>
                    <th>Profile</th>
                    <th colspan="2">Options</th>
             
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($adminurl as $data)
                      @if(Auth::user()->id!=$data->id)
                       <tr>
                       <td>{{ $data->id }}</td>
                       <td><img src="/img/{{$data->avatar}}" alt="profile_picture"  style="width:50px;height:50px; class="img-circle elevation-2"></td>
                       <td>{{ $data->name }}</td>
                       <td>{{ $data->email }}</td>
                       <td>{{ $data->created_at->diffForHumans() }}</td>
                       <td>{{ $data->admin }}</td>
                       <!-- <td>@if($data->admin==0)<label>Not Verify</label>@endif
                            @if($data->admin==1)<label>Admin</label>@endif
                            @if($data->admin==2)<label>Doctor</label>@endif
                            @if($data->admin==3)<label>Patient</label>@endif
                            @if($data->admin==4)<label>Accountant</label>@endif
                            @if($data->admin==5)<label>Nurse</label>@endif
                          </td> -->
                      
                       
                       <td><a href="/admin/{{ $data->id }}/edit">edit</a></td>
                       <td>
                        <form action="{{ url('adminurl.destroy') }}/{{ $data->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="fas fa-trash-alt btn btn-danger">
                        </form>
                        
                        </td>
                        </tr>
                        @endif
                       @endforeach
                       <tbody>
                      </table>
        
</div>

@endsection
