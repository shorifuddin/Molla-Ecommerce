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
    <form method="POST" action="{{ route('product.update',$data->product_id) }}" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="product_id" value="{{ $data->product_id}}">
      <input type="hidden" name="product_slug" value="{{ $data->product_slug}}">
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPDATE Product
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
            <input type="text" class="form-control form_control" name="product_name" value="{{ $data->product_name }}">
            @error('product_name')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>

        @php
            $categories = App\Models\Prodcategory::where('pro_cate_status', 1)->get();
        @endphp

        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Product Category<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
            <select class="form-control form_control" name="pro_category_id">
                <option disabled selected label="Product Category"></option>
                 @foreach ($categories as $cdata)
                <option value="{{ $cdata->pro_cate_id }}" {{ $cdata->pro_cate_id == $data->pro_category_id ?  'selected' : '' }}>{{ $cdata->pro_cate_name }}</option>
                @endforeach
            </select>
            @error('pro_category_id')
            <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
        </div>

        @php
        $brand = App\Models\Brand::where('brand_status', 1)->get();
        @endphp

        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Product Brand<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
            <select class="form-control form_control" name="brand_id">
                <option disabled selected label="Select Brand"></option> --}}
                 @foreach ($brand as $bdata)
                <option value="{{ $bdata->brand_id }}" {{ $bdata->brand_id == $data->brand_id ?  'selected' : '' }}>{{ $bdata->brand_name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
        </div>

          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Price :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="product_price" value="{{ $data->product_price }}">
              @error('product_price')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
          </div>

        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Product Discount Price :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="product_discount_price" value="{{ $data->product_discount_price }}">
            @error('product_discount_price')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Order :</label>
            <div class="col-sm-7">
              <input type="number" class="form-control form_control" name="product_order" value="{{ $data->product_order }}">
              @error('product_order')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Quantity :</label>
            <div class="col-sm-7">
              <input type="number" min="1" class="form-control form_control" name="product_quantity" value="{{ $data->product_quantity }}">
              @error('product_quantity')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Unit :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="product_unit" value="{{ $data->product_unit }}">
              @error('product_unit')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Feature :</label>
            <div class="col-sm-7">
              <input type="number" class="form-control form_control" name="product_feature" value="{{ $data->product_feature }}">
              @error('product_feature')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label col_form_label"> Product Image<span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="file" name="product_image" value="{{ old('product_image') }}">
            @if (!empty($data->product_image))
              <img class="img-fluid img"  src="{{ asset('upload/product/'.$data->product_image) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
            @error('product_image')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label"> Product Gallery Image<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input multiple type="file" name="product_gallery[]" value="{{ old('product_gallery') }}">
              @if (!empty($data->product_gallery))
              <img class="img-fluid img"  src="{{ asset('upload/product/gallery/'.$data->product_gallery) }}">
            @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
            @endif
              @error('product_gallery')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Details :</label>
            <div class="col-sm-7">
                <textarea class="summernote form-control form_control" name="product_detils" id="" value="">{{ $data->product_detils }}</textarea>
            @error('product_detils')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">Product Description :</label>
            <div class="col-sm-7">
                <textarea class="summernote form-control form_control" name="product_description" value="" id="" >{{ $data->product_description }}</textarea>
            @error('product_description')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

      </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Product Update</button>
    </div>


    </div>
  </form>
  </div>
</div>
@endsection
@section('couston_jquery')
<script src="{{asset('content/admin')}}/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script src="{{asset('content/admin')}}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!--form validation init-->
<script src="{{asset('content/admin')}}/plugins/summernote/summernote-bs4.js"></script>

<script>

    jQuery(document).ready(function(){
        $('.wysihtml5').wysihtml5();

        $('.summernote').summernote({
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });

    });
</script>


@endsection
@section('couston_css')
<!--bootstrap-wysihtml5-->
<link rel="stylesheet" type="text/css" href="{{asset('content/admin')}}/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
<link href="{{asset('content/admin')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet">

@endsection
