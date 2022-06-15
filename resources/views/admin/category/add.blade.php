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
    <form method="POST" action="{{ url('dashboard/procatrgory/submit') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Product Catrgory
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('/dashboard/brand/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Product Catrgory</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Name <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="pro_cate_name" value="{{ old('pro_cate_name') }}"
            @error('pro_cate_name')
            placeholder="{{ $message}}"
            @enderror >
          </div>
        </div>

        @php
        $cat = App\Models\Prodcategory::where('pro_cate_status', 1)->get();
        @endphp

        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Parent :</label>
          <div class="col-sm-7">
            <select class="form-control form_control" name="pro_cate_parent">
                <option disabled selected label="Select Brand"></option>
                @foreach ($cat as $data)
                <option value="{{ $data['pro_cate_id'] }}">{{ $data['pro_cate_name'] }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Icon <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="pro_cate_icon" value="{{ old('pro_cate_icon') }}">
            <strong class="invalid-feedback">
              @error('pro_cate_icon')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label">Product Category Image <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="pro_cate_image" value="{{ old('pro_cate_image') }}">
           <strong class="invalid-feedback">
              @error('pro_cate_image')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Producat Category UPLOAD</button>
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
