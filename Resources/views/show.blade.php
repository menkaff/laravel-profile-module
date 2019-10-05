@extends('profile::layouts.master') 
@section('title') {{ $title=trans('profile::messages.profile') }} 
@stop 

@section('content')

@include('profile::layouts.profilebar')
<div class="col-sm-6">
    <h1 class="text-center" style="margin-top:10px;    font-family: iransans; ">
        {{ $user->name.' '.$user->family }}
    </h1>
</div>
<div class="col-md-6">
    <div style="border-radius: 50%;margin:auto;display:block;height:500px;width:500px;margin-bottom: 50px;margin-top:10px;border:5px solid rgba(3, 200, 142, 0.25);">
        <div style="border-radius: 50%;margin:auto;display:block;height:350px;width:350px;margin-bottom: 50px;margin-top:75px;border:5px solid rgba(3, 200, 142, 0.4);">
            <img class="img-circle" style="margin:auto;display:block;height:300px;width:300px;margin-bottom: 50px;margin-top:20px;border:5px solid #03c88e;"
                src="{{$user->image}}" onerror="src='/images/logo.png'">
        </div>
    </div>
</div>






@stop