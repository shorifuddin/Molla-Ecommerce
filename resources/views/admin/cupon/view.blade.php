@extends('layouts.admin')
@section('content')

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
                <i class="md md-add-circle "></i> CUPON Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ url('/dashboard/cupon/all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL CUPON </a>
              </div>
            </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-bordered table-hover table-striped view_custom_table">
                  <tr>
                    <td>Cupon Name</td>
                    <td>:</td>
                    <td>{{ $data->coupon_name }}</td>
                  </tr>
                  <tr>
                    <td>Cupon Code</td>
                    <td>:</td>
                    <td>{{ $data->coupon_code }}</td>
                  </tr>
                  <tr>
                    <td>Cupon Amount</td>
                    <td>:</td>
                    <td>{{ $data->coupon_amount	 }}</td>
                  </tr>
                  <tr>
                    <td>Cupon Start</td>
                    <td>:</td>
                    <td>
                        {!! date('d-M-Y', strtotime($data->coupon_starting)) !!}
                    </td>
                  </tr>
                  <tr>
                    <td>Cupon End</td>
                    <td>:</td>
                    <td>{!! date('d-M-Y', strtotime($data->coupon_ending)) !!}</td>
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
