@extends('layouts.admin')
@section('content')

<div class="row container-fluid">
  <div class="col-md-12 container">
    <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle "></i> All Deteted Banner Information
            </div>
            <div class="col-md-4 card_header_btn ">
              <a href="{{ url('dashboard/banner/add') }}" class="btn btn-xs btn-dark">
              <i class="md md-view-module"></i> Add Banners</a>
            </div>
          </div>
      </div>  

    <div class="card-body container-fluid">
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="thead-dark">
            <tr>
            
              <th scope="col">Banner Title : </th>
              <th scope="col">Banner Sub-Title: </th>
              <th scope="col">Banner Button:</th>
             <th scope="col">Banner BTN-URL:</th>
             <th scope="col">Banner Photo:</th>
             <th>Manage</th>
            </tr>
          </thead>
          <tbody class="text-center">

            @foreach ($restoredata as $data)
                
            <tr>
               
                <td>{{Str::words($data->ban_title,2)  }}</td>
                <td>{{ Str::words($data->ban_subtitle,2) }}</td>
                <td>{{ $data->ban_btn }}</td>
                <td>{{ $data->ban_btnurl }}</td>
                
                <td>
                  @if ($data->ban_img!='')
                    <img class="img-fluid img"  src="{{ asset('upload/banner/'.$data->ban_img) }}">
                  @else
                    <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                  @endif
                </td>

                <td>
                  <a href="{{ url('dashboard/banner/restore/'.$data->ban_id) }}"><i class=" md-cached colors"></i> </a>
                  <a href="{{ url('dashboard/banner/delete/'.$data->ban_id) }}"> <i class="md md-delete colors"></i></a>
                </td>
            </tr>

            @endforeach

          </tbody>
        </table>
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