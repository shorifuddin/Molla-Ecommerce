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
    <form method="POST" action="{{ url('/dashboard/banner/submit') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle "></i> UPLOAD BANNER
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('/dashboard/banner/allbanner') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="fas fa-th"></i> All Banner</a>
           </div>
          </div>
      </div>  

      <div class="card-body">
        <div class="form-group row {{ $errors->has('bantitle') ? 'has-errorr':'' }}">
          <label class="col-sm-3 col-form-label col_form_label">Banner Title <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="bantitle" value="{{ old('bantitle') }}">
            @if ($errors->has('bantitle'))
               <strong class="invalid-feedback">{{ $errors->first('bantitle') }}</strong>
            @endif
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Banner Sub-Title :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="bansubtitle" value="{{ old('bansubtitle') }}">
            <span class="invalid-feedback">
              @error('bansubtitle')
                {{ $message }}
            @enderror</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Banner Button:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="banbtn" value="{{ old('banbtn') }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Banner BTN-URL :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="btnurl" value="{{ old('btnurl') }}">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Photo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="img" value="{{ old('img') }}">
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Banner UPLOAD</button>
    </div>

    </div>
  </form>
  </div> 
</div>  
@endsection