@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All Category Restore </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/brand/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Category</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Product Category Name </th>
									<th>Product Category Parent </th>
									<th>Product Category Icon</th>
									<th>Product Category Image</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody>
                			@foreach ($alldata as $data)
								<tr>
									<td>{{ $data->pro_cate_name}}</td>
									<td>{{ $data->pro_cate_parent}}</td>
									<td>
										@if (!empty($data->pro_cate_icon))
										<img class="img-fluid img" src="{{ asset('upload/category/icon/'.$data->pro_cate_icon) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>
									<td>
										@if (!empty($data->pro_cate_image))
										<img class="img-fluid img" src="{{ asset('upload/category/'.$data->pro_cate_image) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>
									<td>

										@if(Auth::user()->role=='1' )
										<a href="{{ url('dashboard/procatrgory/restoredata/'.$data->pro_cate_id ) }}">
											<i class="md-cached colors"></i></a>
										{{-- <a href="{{ url('/dashboard/brand/softdelete/'.$data->brand_id) }}">
											<i class="md md-delete colors"></i></a>  --}}
										<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal{{ $data->pro_cate_id}}">Delete</button>

										@endif
                  					</td>
								</tr>
								{{-- Modal --}}
								<div id="con-close-modal{{ $data->pro_cate_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title mt-0">Are You Want to Delete it?</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">??</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">

												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
												<a href="{{ url('dashboard/procatrgory/delete/'.$data->pro_cate_id ) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
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
				<div class="btn-group" role="group"> <a type="button" class="btn btn-xs btn-dark">Print</a> <a type="button" class="btn btn-xs btn-warning">Excel</a> <a type="button" class="btn btn-xs btn-dark">PDF</a> </div>
			</div>
		</div>
	</div>
</div>

@endsection
