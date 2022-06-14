@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All Partner Information </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/Partner/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Banner</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Partner Name</th>
									<th>Partner Remaks</th>
									<th>Partner Creator</th>
									<th>Partner Photo</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody>
                            @foreach ($alldata as $data)
								<tr>
									<td>{{ $data->partner_name }}</td>
									<td>{{ $data->partner_url}}</td>
									<td>{{ $data->creatorinfo->name }}</td>
									<td>
										@if (!empty($data->partner_logo))
										<img class="img-fluid img" src="{{ asset('upload/partner/'.$data->partner_logo) }}">
										@else
										<img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
										@endif
                  					</td>
									<td>
										{{-- @if(Auth::user()->role=='1' )
										<a href="{{ url('/dashboard/partner/restoredata/'.$data->partner_id) }}">
											<i class="md-cached colors"></i></a>
										<a href="{{ url('/dashboard/partner/delete/'.$data->partner_id) }}">
											<i class="md md-delete colors"></i></a>
										@endif --}}

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Manage
                                            </button>
                                            <ul class="dropdown-menu">

                                                @if(Auth::user()->role=='1' )
                                                <li><a href="{{ url('/dashboard/partner/restoredata/'.$data->partner_id) }}" class="dropdown-item">Restore</a></li>
                                                <li><a class="dropdown-item" data-toggle="modal" data-target="#con-close-modal">Delete</a></li>
                                                @endif
                                            </ul>
                                        </div>

                 					 </td>
								</tr>
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
												<a href="{{ url('/dashboard/partner/delete/'.$data->partner_id) }}" class="btn btn-danger waves-effect waves-light">Delete</a>
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
