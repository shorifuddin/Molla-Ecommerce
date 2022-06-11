@extends('layouts.admin')
@section('content')

<div class="row container">
  <div class="col-md-12 container">
    <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
              <i class="md md-add-circle "></i> User Information
            </div>
            <div class="col-md-4 card_header_btn ">
              <a href="{{ url('dashboard/partner/all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL Banner </a>
            </div>
          </div>
      </div>  
      				
      <div class="card-body">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-hover table-striped view_custom_table">
                <tr>
                  <td>Partner Name </td>
                  <td>:</td>
                  <td>{{ $data->partner_name  }}</td>
                </tr>
                <tr>
                  <td>Partner URL </td>
                  <td>:</td>
                  <td>{{ $data->partner_url  }}</td>
                </tr>
                <tr>
                  <td>Partner Creator</td>
                  <td>:</td>
                  <td>{{ $data->creatorinfo->name}}</td>
                </tr> 
                <tr>
                  <td>Partner Photo</td>
                  <td>:</td>
                  <td>
                    @if (!empty($data->partner_logo))
                      <img class="img-fluid img"  src="{{ asset('upload/partner/'.$data->partner_logo) }}">
                    @else
                      <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                    @endif
                  </td>
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