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
    <form method="POST" action="{{ url('dashboard/partner/submit') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Partner
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('dashboard/partner/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Partner</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Partner Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="partner_name" value="{{ old('partner_name') }}">
            @error('partner_name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Partner URL :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="partner_url" value="{{ old('partner_url') }}">
            @error('partner_url')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Partner Logo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="partner_logo" value="{{ old('partner_logo') }}">
            @error('partner_logo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Product UPLOAD</button>
    </div>

    </div>
  </form>
  </div>
</div>
@endsection
