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
      <form method="POST" action="{{ url('dashboard/cupon/update/'.$data->coupon_id) }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> CUPON Edit NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ url('/dashboard/cupon/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Cupon</a>
             </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon Name <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                 <input class="form-control" type="text" name="coupon_name" value="{{ $data->coupon_name }}">
                  @error('coupon_title')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon Code <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input class="form-control" type="text" name="coupon_code" value="{{ $data->coupon_code }}">
                  @error('coupon_code')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon Amount <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input class="form-control" type="text" name="coupon_amount"  value="{{ $data->coupon_amount }}">
                  @error('coupon_amount')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon Start <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input id="startDate" class="form-control" type="date" name="coupon_starting" value="{{ $data->coupon_starting }}">
                  @error('coupon_starting')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon End <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input id="endDate" class="form-control" type="date" name="coupon_ending" value="{{ $data->coupon_ending }}">
                  @error('coupon_ending')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label col_form_label">Cupon Remarks <span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                  <input class="form-control" type="text" name="coupon_remarks" value="{{ $data->coupon_remarks }}">
                  @error('coupon_remarks')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>

          </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">UPDATE CUPON</button>
      </div>

      </div>
    </form>
    </div>
  </div>
@endsection
