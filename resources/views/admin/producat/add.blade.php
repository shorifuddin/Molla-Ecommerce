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
    <form method="POST" action="{{ url('dashboard/product/submit') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Product
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('dashboard/product/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Product</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="brand_name" value="{{ old('brand_name') }}">
            @error('brand_remaks')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Product Category<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
            <select class="form-control form_control" name="role">
                <option label="Product Category"></option>
                <option value=""></option>
            </select>
            @error('brand_remaks')
            <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Product Brand<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
            <select class="form-control form_control" name="role">
                <option label="Select Brand"></option>
                <option value=""></option>
            </select>
            @error('brand_remaks')
            <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
        </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Price :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="brand_remaks" value="{{ old('brand_remaks') }}">
              @error('brand_remaks')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
          </div>

        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Product Discount Price :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="brand_remaks" value="{{ old('brand_remaks') }}">
            @error('brand_remaks')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Order :</label>
            <div class="col-sm-7">
              <input type="number" class="form-control form_control" name="brand_remaks" value="{{ old('brand_remaks') }}">
              @error('brand_remaks')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Quantity :</label>
            <div class="col-sm-7">
              <input type="number" min="1" class="form-control form_control" name="brand_remaks" value="{{ old('brand_remaks') }}">
              @error('brand_remaks')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Brand Photo <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="brand_image" value="{{ old('brand_image') }}">
            @error('brand_remaks')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Brand UPLOAD</button>
    </div>

    </div>
  </form>
  </div>
</div>
@endsection
