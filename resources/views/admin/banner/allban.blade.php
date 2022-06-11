@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary card_header">
				<div class="row">
					<div class="col-md-8 card_header_title"> <i class="md md-add-circle "></i> All Banner Information </div>
					<div class="col-md-4 card_header_btn "> <a href="{{ url('/dashboard/banner/add') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> Add Banner</a> </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead class="thead-dark">
								<tr>
									<th>Banner Title</th>
									<th>Banner Sub-Title</th>
									<th>Banner Button</th>
									<th>Banner BTN-URL</th>
									<th>Banner Photo</th>
									<th>Manage</th>
								</tr>
							</thead>
							<tbody> 
                @foreach ($alldata as $data)
								<tr>
									<td>{{ $data->ban_title }}</td>
									<td>{{ $data->ban_subtitle }}</td>
									<td>{{ $data->ban_btn }}</td>
									<td>{{ $data->ban_btnurl }}</td>
									<td> 
                    @if (!empty($data->ban_img)) 
                     <img class="img-fluid img" src="{{ asset('upload/user/'.$data->ban_img) }}"> 
                    @else 
                     <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}"> 
                    @endif 
                  </td>
									<td> 
                    <a href="{{ url('/dashboard/user/view/'.$data->ban_id) }}"><i class="md md-remove-red-eye colors"></i></a> @if(Auth::user()->role=='1' ) 
                    <a href="{{ url('/dashboard/user/edit/'.$data->ban_id) }}"><i class="md md-border-color colors"></i></a> 
                    <a href="{{ url('/dashboard/user/softdelete/'.$data->ban_id) }}"><i class="md md-delete colors"></i></a> @endif 
                  </td>
								</tr> 
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