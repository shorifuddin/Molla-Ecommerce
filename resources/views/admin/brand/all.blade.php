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

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All Brand Information </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/brand/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Banner</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Brand Name</th>
									<th>Brand Remaks</th>
									<th>Brand Creator</th>
									<th>Brand Photo</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody>
                			@foreach ($alldata as $data)
								<tr>
									<td>{{ $data->brand_name}}</td>
									<td>{{ $data->brand_remaks}}</td>
									<td>{{ $data->creatorinfo->name }}</td>
									<td>
										@if (!empty($data->brand_image))
										<img class="img-fluid img" src="{{ asset('upload/brand/'.$data->brand_image) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>
									<td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Manage
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ url('/dashboard/brand/view/'.$data->brand_id) }}" class="dropdown-item">View</a></li>
                                                @if(Auth::user()->role=='1' )
                                                <li><a href="{{ url('/dashboard/brand/edit/'.$data->brand_id) }}" class="dropdown-item">Edit</a></li>
                                                <li>
                                                    <button  class="dropdown-item" data-toggle="modal" data-target="#con-close-modal{{ $data->brand_id }}">Delete</button>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>

										{{-- <a href="{{ url('/dashboard/brand/view/'.$data->brand_id) }}">
											<i class="md md-remove-red-eye colors"></i> </a>
										@if(Auth::user()->role=='1' )
										<a href="{{ url('/dashboard/brand/edit/'.$data->brand_id) }}">
											<i class="md md-border-color colors"></i></a> --}}
										{{-- <a href="{{ url('/dashboard/brand/softdelete/'.$data->brand_id) }}">
											<i class="md md-delete colors"></i></a>  --}}
											{{-- <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Delete</button> --}}
                                        {{-- @endif --}}
                  					</td>
								</tr>
								{{-- Modal --}}
								<div id="con-close-modal{{ $data->brand_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
												<a href="{{ url('/dashboard/brand/softdelete/'.$data->brand_id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
											</div>
										</div>
									</div>
								</div>

							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer bg-secondary card_footer">
				<div class="dt-buttons btn-group">
					<button class="btn btn-info buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
					<button class="btn btn-warning buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" type="button"><span>CSV</span></button>
					<button class="btn btn-danger buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-danger" type="button"><span>PDF</span></button>
					<button class="btn btn-primary buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Print</span></button>
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
