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
      <form method="POST" action="{{ url('/dashboard/user/update') }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> REGISTRATION NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ url('/dashboard/user/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All User</a>
             </div>
            </div>
        </div>  
  
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" name="name" value="{{ $data->name }}">

              <input type="hidden" name="id" value="{{ $data->id }}">

              <span class="invalid-feedback">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" name="phone" value="{{ $data->phone }}">
              @error('phone')
                  {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="email" class="form-control form_control" name="email"  value="{{ $data->email }}">
              @error('email')
                  {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="password" class="form-control form_control" name="password" value="" required autocomplete="password">
              @error('password')
                  {{ $message }}
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" name="password_confirmation" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">User-Role<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="">
                <option value="{{ $data->roleinfo->role_id }}">{{ $data->roleinfo->role_name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-7 ">
              <input type="file" name="image" value="{{ $data->image }}">
              @error('image')
                 <p class="pp">{{ $message }}</p> 
              @enderror
              @if ($data->image!='')
                <img class="img-fluid img"  src="{{ asset('upload/user/'.$data->image) }}">
              @else
                 <img class="img-fluid img" src="{{ asset('upload/avatar.jpg') }}">
              @endif
              
            </div>
          </div>
        </div>
  
      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">REGISTRATION</button>
      </div>
  
      </div>
    </form>
    </div> 
  </div>   
@endsection