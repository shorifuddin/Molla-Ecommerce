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
    <form method="POST" action="{{ route('partner.update',$data->partner_id ) }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="partner_id" value="{{ $data->partner_id  }}">
      <input type="hidden" name="partner_slug" value="{{ $data->partner_slug }}">
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPDATE Partner
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('dashboard/partner/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Partner</a>
           </div>
          </div>
      </div>  

      <div class="card-body">
        <div class="form-group row {{ $errors->has('partner_name') ? 'has-errorr':'' }}">
          <label class="col-sm-3 col-form-label col_form_label">Partner Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="partner_name" value="{{ $data->partner_name }}">
            @if ($errors->has('partner_name'))
               <strong class="invalid-feedback">{{ $errors->first('partner_name') }}</strong>
            @endif
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Partnerr URL :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="partner_url" value="{{ $data->partner_url }}">
            <span class="invalid-feedback">
              @error('partner_url')
                {{ $message }}
            @enderror</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Partner LOGO <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="partner_logo" value="{{ $data->partner_logo }}">
            @if ($data->partner_logo!='')
              <img class="img-fluid img"  src="{{ asset('upload/partner/'.$data->partner_logo) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Partner Update</button>
    </div>

    </div>
  </form>
  </div> 
</div>  
@endsection