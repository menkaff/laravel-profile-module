@extends('profile::layouts.master')
@section('title')
{{ $title=trans('profile::messages.edit').' '.trans('profile::messages.password') }}
@stop


@section('content')


@include('profile::layouts.profilebar')

{!! Form::open(['url'=>['/profile/password'],'class'=>'form-horizontal']) !!}

@include('theme::layout_coreui.errorbox')

<div class="form-group">
    <label for="" class="col-md-2 control-label">{{trans('profile::messages.password')}}</label>
    <div class="col-sm-5">
        <input class="form-control" name="password" type="password">
        </input>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-md-2 control-label">{{trans('profile::messages.password_confirmation')}}</label>
    <div class="col-sm-5">
        <input class="form-control" name="password_confirmation" type="password">
        </input>
    </div>
</div>
{!! Form::submit(trans('profile::messages.edit'),['class'=>'btn btn-primary text-right']) !!}

</form>
@stop