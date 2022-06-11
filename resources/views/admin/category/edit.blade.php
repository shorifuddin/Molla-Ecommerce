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
    <form method="POST" action="{{ route('procategory.update',$data->pro_cate_id) }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="pro_cate_id" value="{{ $data->pro_cate_id }}">
      <input type="hidden" name="pro_cate_slug" value="{{ $data->pro_cate_slug }}">
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPDATE BANNER
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ route('procategory.all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Banner</a>
           </div>
          </div>
      </div>  

      <div class="card-body">
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="pro_cate_name" value="{{ $data->pro_cate_name  }}">
            <span class="invalid-feedback">
              @error('pro_cate_name')
                {{ $message }}
              @enderror
           </span>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Parent :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="pro_cate_parent" value="{{ $data->pro_cate_parent }}">
            <span class="invalid-feedback">
              @error('pro_cate_parent')
                {{ $message }}
            @enderror</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Icon <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="pro_cate_icon" value="{{ $data->pro_cate_icon }}">
            @if ($data->pro_cate_icon!='')
              <img class="img-fluid img"  src="{{ asset('upload/category/icon/'.$data->pro_cate_icon) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Image <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="pro_cate_image" value="{{ $data->pro_cate_image }}">
            @if ($data->pro_cate_image!='')
              <img class="img-fluid img"  src="{{ asset('upload/category/'.$data->pro_cate_image) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Producat Category Update</button>
    </div>

    </div>
  </form>
  </div> 
</div>  
@endsection