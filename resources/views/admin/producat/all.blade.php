@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All Product Information </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/product/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Product</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Product Category</th>
									<th>Brand Name</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Discount Price</th>
									<th>Product Quantity</th>
									<th>Product Unit</th>
									<th>Product Detils</th>
									<th>Product Description</th>
                                    <th>Product Order</th>
									<th>Product Feature</th>
									<th>Product Image</th>
									<th>Product Gallery</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody>
                			@foreach ($alldata as $data)
								<tr>
									<td>{{ $data->category->pro_cate_name}}</td>
									<td>{{ $data->brand->brand_name}}</td>
									<td>{{ $data->product_name}}</td>
									<td>{{ $data->product_price}}</td>
									<td>{{ $data->product_discount_price}}</td>
									<td>{{ $data->product_quantity}}</td>
									<td>{{ $data->product_unit}}</td>
									<td>{{ Str::words($data->product_detils,5)}}</td>
									<td>{{ Str::words($data->product_description,5)}}</td>
									<td>{{ $data->product_order }}</td>
									<td>{{ $data->product_feature }}</td>

									<td>
										@if (!empty($data->product_image))
										<img class="img-fluid img" src="{{ asset('upload/product/'.$data->product_image) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>

                                    <td>
										@if (!empty($data->product_gallery))
										<img class="img-fluid img" src="{{ asset('upload/product/'.$data->product_gallery) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>

									<td>
										{{-- <a href="{{ url('/dashboard/brand/view/'.$data->product_id) }}">
											<i class="md md-remove-red-eye colors"></i> </a>
										@if(Auth::user()->role=='1' )
										<a href="{{ url('/dashboard/brand/edit/'.$data->product_id) }}">
											<i class="md md-border-color colors"></i></a>
										<!-- <a href="{{ url('/dashboard/brand/softdelete/'.$data->brand_id) }}">
											<i class="md md-delete colors"></i></a>  -->
											<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Delete</button>

										@endif --}}

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
												<a href="{{ url('/dashboard/brand/softdelete/'.$data->product_id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
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

@section('couston_css')
<!-- DataTables -->
<link href="{{asset('content/admin')}}/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('content/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
<link href="{{asset('content/admin')}}/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
