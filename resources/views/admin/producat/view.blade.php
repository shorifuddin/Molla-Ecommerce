@extends('layouts.admin')
@section('content')

<div class="row container">
  <div class="col-md-12 container">
    <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
              <i class="md md-add-circle "></i> Product View
            </div>
            <div class="col-md-4 card_header_btn ">
              <a href="{{ url('dashboard/product/all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL Product </a>
            </div>
          </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-hover table-striped view_custom_table">
                <tr>
                  <td>Product Name </td>
                  <td>:</td>
                  <td>{{ $data->product_name  }}</td>
                </tr>
                <tr>
                  <td>Product Category </td>
                  <td>:</td>
                  <td>{{ $data->category->pro_cate_name  }}</td>
                </tr>
                <tr>
                  <td>Product Brand</td>
                  <td>:</td>
                  <td>{{ $data->brand->brand_name}}</td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td>:</td>
                    <td>{{ $data->product_price}}</td>
                </tr>
                <tr>
                    <td>Product Discount Price</td>
                    <td>:</td>
                    <td>{{ $data->product_discount_price }}</td>
                </tr>
                <tr>
                    <td>Product Image</td>
                    <td>:</td>
                    <td>
                      @if (!empty($data->product_image))
                        <img class="img-fluid img"  src="{{ asset('upload/product/'.$data->product_image) }}">
                      @else
                        <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                      @endif
                    </td>
                  </tr>
                  <tr>
                      <td>Product Gallery Image</td>
                      <td>:</td>
                      <td>
                          @php
                          $images = explode(',',$data->product_gallery)
                          @endphp
                       @if (!empty($data->product_gallery))
                          @foreach($images as $gal )
                          <img class="img-fluid img"  src="{{ asset('upload/product/gallery/'.$gal) }}">
                          @endforeach
                        @else
                          <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                        @endif
                      </td>
                  </tr>
                <tr>
                    <td>Product Order </td>
                    <td>:</td>
                    <td>{{ $data->product_order}}</td>
                </tr>
                <tr>
                    <td>Product Quantity</td>
                    <td>:</td>
                    <td>{{ $data->product_quantity}}</td>
                </tr>
                <tr>
                    <td>Product Unit</td>
                    <td>:</td>
                    <td>{{ $data->product_unit}}</td>
                </tr>
                <tr>
                    <td>Product Feature</td>
                    <td>:</td>
                    <td>{{ $data->product_feature}}</td>
                </tr>
                <tr>
                    <td>Product Details</td>
                    <td>:</td>
                    <td>{{ $data->product_detils}}</td>
                </tr>
                <tr>
                    <td>Product Description </td>
                    <td>:</td>
                    <td>{{ $data->product_description}}</td>
                </tr>

            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>

    <div class="card-footer bg-secondary card_footer">
      <div class="btn-group" role="group">
        <a type="button" class="btn btn-xs btn-dark">Print</a>
        <a type="button" class="btn btn-xs btn-warning">Excel</a>
        <a type="button" class="btn btn-xs btn-dark">PDF</a>
      </div>
    </div>

    </div>
  </div>
</div>
@endsection
