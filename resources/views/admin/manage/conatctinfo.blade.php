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
    <form method="POST" action="{{ url('/dashboard/contact/update') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Brand
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('/dashboard/brand/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Brand</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Phone One <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_phone_one" value="{{ $contact->contact_phone_one }}">
            <strong class="invalid-feedback">
              @error('basic_title')
                {{ $message }}
              @enderror
          </strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Phone Two :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_phone_two" value="{{ $contact->contact_phone_two }}">
            <strong class="invalid-feedback">
              @error('contact_phone_two')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Email One :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_email_one" value="{{ $contact->contact_email_one }}">
            <strong class="invalid-feedback">
              @error('contact_email_one')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Email Two :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_email_two" value="{{ $contact->contact_email_two }}">
            <strong class="invalid-feedback">
              @error('contact_email_two')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Address One :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_address_one" value="{{ $contact->contact_address_one }}">
            <strong class="invalid-feedback">
              @error('contact_address_one')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Contact Address Two :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="contact_address_two" value="{{ $contact->contact_address_two }}">
            <strong class="invalid-feedback">
              @error('contact_address_two')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Conatct Update</button>
    </div>

    </div>
  </form>
  </div>
</div>
@endsection
