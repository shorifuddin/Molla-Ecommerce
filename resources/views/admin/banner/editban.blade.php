@extends('layouts.admin')
@section('content')

<div class="row container">
  <div class="col-md-12 container">
    <form method="POST" action="{{ url('dashboard/banner/update') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPDATE BANNER
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('dashboard/banner/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Banner</a>
           </div>
          </div>
      </div>  

      <div class="card-body">
        <div class="form-group row {{ $errors->has('bantitle') ? 'has-errorr':'' }}">
          <label class="col-sm-3 col-form-label col_form_label">Banner Title <span class="req_star">*</span>:</label>
          <div class="col-sm-7">

            <input type="hidden" name="id" value="{{ $data->ban_id }}">
            <input type="hidden" name="slug" value="{{ $data->ban_slug }}">

            <input type="text" class="form-control form_control" name="bantitle" value="{{ $data->ban_title }}">
            @if ($errors->has('bantitle'))
               <strong class="invalid-feedback">{{ $errors->first('bantitle') }}</strong>
            @endif
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Banner Sub-Title :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="bansubtitle" value="{{ $data->ban_subtitle }}">
            <span class="invalid-feedback">
              @error('bansubtitle')
                {{ $message }}
            @enderror</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Banner Button:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="banbtn" value="{{ $data->ban_btn }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Banner BTN-URL :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="btnurl" value="{{ $data->ban_btnurl }}">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Photo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="img" value="{{ $data->ban_img }}">
            @if ($data->ban_img!='')
                      
                    <img class="img-fluid img"  src="{{ asset('upload/banner/'.$data->ban_img) }}">
                          
                  @else
                      
                    <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                     
                  @endif
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