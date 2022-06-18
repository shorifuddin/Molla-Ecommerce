@extends('layouts.admin')
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
                                    <th>Product Image</th>
									<th>Product Category</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Order</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($alldata as $data)
                                    <tr>
                                        <td>
                                            @if (!empty($data->product_image))
                                            <img class="img-fluid img" src="{{ asset('upload/product/'.$data->product_image) }}">
                                            @else
                                            <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
                                            @endif
                                        </td>
                                        <td>{{ $data->category->pro_cate_name}}</td>
                                        <td>{{ Str::words($data->product_name,4)}}</td>
                                        <td>{{ $data->product_price}}</td>
                                        <td>{{ $data->product_order }}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ url('/dashboard/product/restoredata/'.$data->product_id) }}" class="dropdown-item">Restore</a></li>
                                                    <li><a  class="dropdown-item" data-toggle="modal" data-target="#con-close-modal{{ $data->product_id }}">Delete</a></li>

                                                </ul>
                                            </div>
                                        </td>
								    </tr>
                                    {{-- Modal --}}
								<div id="con-close-modal{{ $data->product_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
												<a href="{{ url('/dashboard/product/delete/'.$data->product_id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
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
