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
              <a href="{{ url('dashboard/banner/all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL Banner </a>
            </div>
          </div>
      </div>  
      				
      <div class="card-body">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-hover table-striped view_custom_table">
                <tr>
                  <td>Banner Title </td>
                  <td>:</td>
                  <td>{{ $data->ban_title }}</td>
                </tr>
                <tr>
                  <td>Banner Sub-Title </td>
                  <td>:</td>
                  <td>{{ $data->ban_subtitle  }}</td>
                </tr>
                <tr>
                  <td>Banner Button</td>
                  <td>:</td>
                  <td>{{ $data->ban_btn}}</td>
                </tr> 
                <tr>
                  <td>Banner BTN-URL</td>
                  <td>:</td>
                  <td>{{ $data->ban_btnurl }}</td>
                </tr>
                <tr>
                  <td>Banner Creator</td>
                  <td>:</td>
                  <td>{{ $data->creator->name }}</td>
                </tr>
                <tr>
                  <td>Banner Photo</td>
                  <td>:</td>
                  <td>
                    @if ($data->ban_img!='')
                        
                      <img class="img-fluid img"  src="{{ asset('upload/banner/'.$data->ban_img) }}">
                            
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