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

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All User Information </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/user/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add User</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Role</th>
									<th>Photo</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody> 
                @foreach ($alldata as $data)
								<tr>
									<td>{{ $data->name }}</td>
									<td>{{ $data->phone }}</td>
									<td>{{ $data->email }}</td>
									<td>{{ $data->roleinfo->role_name }}</td>
									<td> 
                    				@if (!empty($data->image)) 
                     					<img class="img-fluid img" src="{{ asset('upload/user/'.$data->image) }}">
                    				@else 
                     					<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}"> 
                    				@endif 
                  					</td>
					<td> 
						<a href="{{ url('/dashboard/user/view/'.$data->id) }}"><i class="md md-remove-red-eye colors"></i></a> 
						@if(Auth::user()->role=='1' ) 
						<a href="{{ url('/dashboard/user/edit/'.$data->id) }}"><i class="md md-border-color colors"></i></a> 
						<a href="{{ url('/dashboard/user/softdelete/'.$data->id) }}"><i class="md md-delete colors"></i></a> 
						@endif 
                  	</td>
								</tr> 
                @endforeach 
              </tbody>
						</table>
					</div>
				</div>
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