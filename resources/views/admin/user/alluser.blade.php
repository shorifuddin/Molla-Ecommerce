@extends('layouts.admin')
@section('couston_css')
<!-- DataTables -->
<link href="{{asset('content/admin')}}/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('content/admin')}}/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
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
@section('couston_jquery')

<!-- Required datatable js-->
<script src="{{asset('content/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>

<script src="{{asset('content/admin')}}/plugins/datatables/jszip.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/buttons.print.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('content/admin')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('content/admin')}}/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable( { keys: true } );
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable( { ajax: "{{asset('content/admin')}}/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
        var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
    } );
    TableManageButtons.init();
</script>

@endsection
