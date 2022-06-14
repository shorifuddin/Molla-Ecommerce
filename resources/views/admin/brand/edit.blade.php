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
    <form method="POST" action="{{ route('brand.update',$data->brand_id) }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="brand_id" value="{{ $data->brand_id }}">
      <input type="hidden" name="brand_slug" value="{{ $data->brand_slug }}">
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPDATE Brand
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('dashboard/brand/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Brand</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row {{ $errors->has('brand_name') ? 'has-errorr':'' }}">
          <label class="col-sm-3 col-form-label col_form_label">Brand Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">

            <input type="text" class="form-control form_control" name="brand_name" value="{{ $data->brand_name  }}">
            @if ($errors->has('brand_name'))
               <strong class="invalid-feedback">{{ $errors->first('brand_name') }}</strong>
            @endif
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Brand Remaks :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="brand_remaks" value="{{ $data->brand_remaks }}">
            <span class="invalid-feedback">
              @error('brand_remaks')
                {{ $message }}
            @enderror</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Brand Photo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="brand_image" value="{{ $data->brand_image }}">
            @if ($data->brand_image!='')
              <img class="img-fluid img"  src="{{ asset('upload/brand/'.$data->brand_image) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Brand Update</button>
    </div>

    </div>
  </form>
  </div>
</div>
@endsection
