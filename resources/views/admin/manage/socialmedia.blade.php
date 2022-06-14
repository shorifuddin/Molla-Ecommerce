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
    <form method="POST" action="{{ url('/dashboard/social/update') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Social Media Info
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="{{ url('/dashboard/brand/all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Social Media Info</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Facebook <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_facebook" value="{{ $social->sm_facebook }}">
            <strong class="invalid-feedback">
              @error('sm_facebook')
                {{ $message }}
              @enderror
          </strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Twitter :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_twitter" value="{{ $social->sm_twitter }}">
            <strong class="invalid-feedback">
              @error('sm_twitter')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Linkedin :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_linkedin" value="{{ $social->sm_linkedin }}">
            <strong class="invalid-feedback">
              @error('sm_linkedin')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Dribbble :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_dribbble" value="{{ $social->sm_dribbble }}">
            <strong class="invalid-feedback">
              @error('sm_dribbble')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Youtube :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_youtube" value="{{ $social->sm_youtube }}">
            <strong class="invalid-feedback">
              @error('sm_slack')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Slack :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_slack" value="{{ $social->sm_slack }}">
            <strong class="invalid-feedback">
              @error('sm_slack')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Instagram :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_instagram" value="{{ $social->sm_instagram }}">
            <strong class="invalid-feedback">
              @error('sm_instagram')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Behance :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_behance" value="{{ $social->sm_behance }}">
            <strong class="invalid-feedback">
              @error('sm_behance')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Google :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_google" value="{{ $social->sm_google }}">
            <strong class="invalid-feedback">
              @error('sm_google')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Reddit :</label>
          <div class="col-sm-7">
            <input type="text" class="form-control form_control" name="sm_reddit" value="{{ $social->sm_reddit }}">
            <strong class="invalid-feedback">
              @error('sm_reddit')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">Social Update</button>
    </div>

    </div>
  </form>
  </div>
</div>
@endsection
