
@extends('layouts.app')
<style>
    body:before {
        content: "";
        display: block;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -10;
        /*background-color: #005c9a;*/
        background: url("https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=668&q=80") no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    </style>
@section('content')
<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="row">
                 <div class="col-md-4">
                     <div class="card text-white bg-danger  ">
                         <div class="card-header"> <h1>عدد الاعضاء  </h1> </div>
                         <div class="card-body">{{$users}}</div>
                     </div>

                 </div>
                 <div class="col-md-4">
                     <div class="card text-white bg-info">
                         <div class="card-header"><h1>اجمالي العائد  </h1>  </div>
                         <div class="card-body">{{$money}}</div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
</div>

@endsection
