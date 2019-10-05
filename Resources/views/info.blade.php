@extends('profile::layouts.master')
@section('title')
{{ $title=trans('profile::messages.edit').' '.trans('profile::messages.info') }}
@stop


@section('content')

@include('profile::layouts.profilebar')


{!! Form::open(['url'=>['/profile/info'],'class'=>'form-horizontal','files'=>'true']) !!}

@include('theme::layout_coreui.errorbox')

<div class="row col-md-12">
    <div class="form-group col-md-6">
        <label for="" class="col-md-12 control-label">{{trans('profile::messages.name')}}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name='name' value='{{Request::old('name',$user->name)}}' />
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="" class="col-md-12 control-label">{{trans('profile::messages.family')}}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name='family' value='{{Request::old('family',$user->family)}}' />
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="" class="col-md-12 control-label">{{trans('profile::messages.mobile')}}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name='mobile' value='{{Request::old('mobile',$user->mobile)}}' />
        </div>
    </div>


    <div class="form-group col-md-6">
        <label for="" class="col-md-12 control-label">{{trans('profile::messages.image')}}</label>
        <div class="col-sm-8">
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        {{trans('profile::messages.choose')}}…
                        <input accept=".jpg,.png,.jpeg" name="image" style="display: none;" type="file">
                        </input>
                    </span>
                </label>
                <input class="form-control" readonly="" type="text">
                </input>
            </div>
        </div>
    </div>
    <div class="form-group">
        <img class="col-md-3 col-md-offset-1" src="{{$user->image}}" />
    </div>
    {!! Form::submit(trans('profile::messages.edit'),['class'=>'col-md-offset-1 btn btn-primary text-right']) !!}
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {

        /// File Selector

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});

});
</script>
@stop