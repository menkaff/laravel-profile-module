@extends('profile::layouts.master')
@section('title')
{{ $title=trans('profile::messages.edit').' '.trans('profile::messages.email') }}
@stop


@section('content')

@include('profile::layouts.profilebar')


<form action='/profile/email' class='form-horizontal' method="POST">
    @csrf

    @include('theme::layout_coreui.errorbox')

    <div class="form-group">
        <label for="" class="col-md-2 control-label">{{trans('profile::messages.email')}}</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name='email' value='{{Request::old('email',$user->email)}}' />
        </div>
    </div>
    <button type="submit" class="btn btn-primary text-right">
        {{trans('profile::messages.edit')}}
    </button>
</form>

@stop