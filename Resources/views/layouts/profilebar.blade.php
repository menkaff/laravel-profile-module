<div class="col-md-12 profilebar">
    <br />
    <a class="btn btn-info" href="/profile">
        {{trans('profile::messages.profile')}}
    </a>

    <a class="btn btn-info" href="/profile/info">
        {{trans('profile::messages.edit').' '.trans('profile::messages.info')}}
    </a>

    <a class="btn btn-info" href="/profile/email">
        {{trans('profile::messages.edit').' '.trans('profile::messages.email')}}
    </a>

    <a class="btn btn-info" href="/profile/password">
        {{trans('profile::messages.edit').' '.trans('profile::messages.password')}}
    </a>
</div>