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
                <i class="md md-add-circle "></i> All Delete User Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ url('/dashboard/user/alluser') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All User</a>
              </div>
            </div>
        </div>

      <div class="card-body container">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Name </th>
                <th scope="col">Phone </th>
                <th scope="col">Email</th>
               <th scope="col">Role</th>
               <th scope="col">Photo</th>
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
                    @if ($data->image!='')
                     <img class="img-fluid img"  src="{{ asset('upload/user/'.$data->image) }}">
                    @else
                      <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
                    @endif
                  </td>
                  <td>
                    {{-- <a href="{{ url('/dashboard/user/restore/'.$data->id) }}"><i class=" md-cached colors"></i></a>
                    <a href="{{ url('/dashboard/user/delete/'.$data->id) }}"><i class="md md-delete colors"></i></a> --}}

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                        </button>
                        <ul class="dropdown-menu">
                           @if(Auth::user()->role=='1' )
                            <li><a href="{{  url('/dashboard/user/restore/'.$data->id) }}" class="dropdown-item">Edit</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#con-close-modal">Delete</a></li>
                            @endif
                        </ul>
                    </div>

                  </td>
                </tr>
                {{-- Modal --}}
					<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title mt-0">Are You Want to Delete it?</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
								</div>
								<div class="modal-body">
									<div class="row">
                                        </div>
											</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
									<a href="{{ url('/dashboard/user/delete/'.$data->id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
								</div>
							</div>
						</div>
					</div>
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
