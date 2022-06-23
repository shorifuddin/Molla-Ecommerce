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

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle "></i> All Cupon Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ url('/dashboard/cupon/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Cupon</a>
              </div>
            </div>
        </div>

      <div class="card-body container">
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Cupon Name </th>
                <th scope="col">Cupon Code </th>
                <th scope="col">Cupon Amount </th>
                <th scope="col">Cupon Start </th>
                <th scope="col">Cupon End </th>
                <th scope="col">Cupon Remarks </th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($alldata as $data)
            <tr>
                  <td>{{ $data->coupon_name }}</td>
                  <td>{{ $data->coupon_code }}</td>
                  <td>{{ $data->coupon_amount }}</td>
                  <td>{{ $data->coupon_starting }}</td>
                  <td>{{ $data->coupon_ending }}</td>
                  <td>{{ $data->coupon_remarks }}</td>

                <td>
                    {{-- <a href="{{ url('/dashboard/role/view/'.$data->role_id) }}"><i class="md md-remove-red-eye colors"></i></a>
                    <a href="{{ url('/dashboard/role/edit/'.$data->role_id) }}"><i class="md md-border-color colors"></i></a>
                    <a href="{{ url('/dashboard/role/deleterole/'.$data->role_id) }}"><i class="md md-delete colors"></i></a> --}}

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/dashboard/cupon/restoredata/'.$data->coupon_id) }}" class="dropdown-item">Restore</a></li>
                            @if(Auth::user()->role=='1' )

                            <li>
                                <button  class="dropdown-item" data-toggle="modal" data-target="#con-close-modal{{ $data->coupon_id}}">Delete</button>
                            </li>
                            @endif
                        </ul>
                    </div>
                </td>
             </tr>
              {{-- Modal --}}
								<div id="con-close-modal{{ $data->coupon_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
												<a href="{{ url('/dashboard/cupon/delete/'.$data->coupon_id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
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
