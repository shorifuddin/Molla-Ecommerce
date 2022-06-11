@extends('layouts.admin')
@section('content')

@if (Session::has('success'))
<script>
swal({ title: "Good job!",text: "You clicked the button!", icon: "success",timer:3000,});
</script>
@endif

@if (Session::has('error'))
<script>
swal({ title: "Good error!",text: "You clicked the button!", icon: "error",});
</script>
@endif

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle "></i> All Role Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ url('/dashboard/role/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Role</a>
              </div>
            </div>
        </div>  
  
      <div class="card-body container">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="thead-dark">
              <tr>
              
                <th scope="col">Role Name </th>
               
                
               <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($alldata as $data)
              
              <tr>
                  <td>{{ $data->role_name }}</td>
                  
                 <td>
                    <a href="{{ url('/dashboard/role/view/'.$data->role_id) }}"><i class="md md-remove-red-eye colors"></i></a>
                    <a href="{{ url('/dashboard/role/edit/'.$data->role_id) }}"><i class="md md-border-color colors"></i></a>
                    <a href="{{ url('/dashboard/role/deleterole/'.$data->role_id) }}"><i class="md md-delete colors"></i></a>
                  </td>
              </tr>
                
              @endforeach
            </tbody>
          </table>
      </div>
  
      <div class="card-footer bg-secondary card_footer">
        <div class="btn-group" role="group">
          <a type="button" class="btn btn-xs btn-dark">Print</a>
          <a type="button" class="btn btn-xs btn-warning">Excel</a>
          <a type="button" class="btn btn-xs btn-dark">PDF</a>
        </div>
      </div>
  
      </div>
    </div> 
  </div>   
@endsection