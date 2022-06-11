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
    <form method="POST" action="{{ url('/dashboard/manage/update') }}" enctype="multipart/form-data">
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
        <div class="form-group row {{ $errors->has('basic_company') ? 'has-errorr':'' }}">
          <label class="col-sm-3 col-form-label col_form_label">Basic Company <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="basic_company" value="{{ $basic->basic_company }}">
            @if ($errors->has('basic_company'))
               <strong class="invalid-feedback">{{ $errors->first('basic_company') }}</strong>
            @endif
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Basic Title :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="basic_title" value="{{ $basic->basic_title }}">
            <strong class="invalid-feedback">
              @error('basic_title')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Header Logo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input id="header_logo_input" type="file" name="basic_header_logo" value="{{ old('basic_header_logo') }}">
            @if (!empty($basic->basic_header_logo))
              <img id="header_logo_preview" class="img-fluid img"  src="{{ asset('upload/basic/'.$basic->basic_header_logo) }}">
            @else
              <img id="header_logo_preview" class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
            @endif
            <strong class="invalid-feedback">
              @error('basic_header_logo')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Footer Logo <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="file" name="basic_footer_logo" value="{{ old('basic_footer_logo') }}">
              @if (!empty($basic->basic_footer_logo))
              <img class="img-fluid img"  src="{{ asset('upload/basic/'.$basic->basic_footer_logo) }}">
              @else
              <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
              @endif
              <strong class="invalid-feedback">
                @error('basic_footer_logo')
                  {{ $message }}
                @enderror</strong>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Basic Favicon <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="file" name="basic_favicon" value="{{ old('basic_favicon') }}">
              @if (!empty($basic->basic_favicon))
              <img class="img-fluid img"  src="{{ asset('upload/basic/'.$basic->basic_favicon) }}">
              @else
              <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
              @endif
              <strong class="invalid-feedback">
                @error('basic_favicon')
                  {{ $message }}
                @enderror</strong>
            </div>
          </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Basic Update</button>
    </div>

    </div>
  </form>
  </div> 
</div> 
<script type="text/javascript">
  // Header Logo
  $('#header_logo_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#header_logo_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script> 
@endsection