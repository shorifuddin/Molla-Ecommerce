@extends('layouts.admin')
@section('content')

<div class="row">

    <div class="col-md-4 col-xl-4">
      <a href="{{ route('user.restore') }}">
       <div class="mini-stat clearfix bx-shadow bg-white">
        <h4  class="recyle">User Delete Information</h4><hr>
          <span class="mini-stat-icon bg-primary"><i class="md-group"></i></span>
          <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$user->count()}}</span> Total User Delete </div>
        </div>
      </a>
    </div>

    <div class="col-md-4 col-xl-4">
      <a href="{{ route('product.restore') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
         <h4  class="recyle">Product Delete Information</h4><hr>
           <span class="mini-stat-icon bg-purple"><i class="md-shopping-basket"></i></span>
           <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$product->count()}}</span> Total Product Delete </div>
        </div>
      </a>
     </div>

     <div class="col-md-4 col-xl-4">
       <a href="{{ route('brand.restore') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
         <h4  class="recyle">Brand Delete Information</h4><hr>
           <span class="mini-stat-icon bg-success"><i class=" md-loyalty"></i></span>
           <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$brand->count()}}</span> Total Brand Delete </div>
         </div>
        </a>
     </div>

</div>
<div class="row">

    <div class="col-md-4 col-xl-4">
        <a href="{{ route('procategory.restore') }}">
         <div class="mini-stat clearfix bx-shadow bg-white">
          <h4 class="recyle">Category Delete Information</h4><hr>
            <span class="mini-stat-icon bg-danger"><i class="md-store-mall-directory"></i></span>
            <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$category->count()}}</span> Total Category Delete </div>
         </div>
        </a>
    </div>

    <div class="col-md-4 col-xl-4">
      <a href="{{ route('banner.restore') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
         <h4  class="recyle">Banner Delete Information</h4><hr>
           <span class="mini-stat-icon bg-info"><i class=" md-mms"></i></span>
           <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$banner->count()}}</span> Total Banner Delete </div>
        </div>
       </a>
     </div>

     <div class="col-md-4 col-xl-4">
       <a href="{{ route('partner.restore') }}">
        <div class="mini-stat clearfix bx-shadow bg-white">
         <h4  class="recyle">Partner Delete Information</h4><hr>
           <span class="mini-stat-icon bg-warning"><i class=" md-verified-user"></i></span>
           <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{$partner->count()}}</span> Total Partner Delete </div>
         </div>
    </a>
     </div>

</div>




@endsection
