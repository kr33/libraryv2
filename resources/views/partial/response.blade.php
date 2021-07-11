@if (Session::has('message'))
<!-- success message start -->
<div class="alert alert-success alert-dismissible fade show" role="alert" @if(Session::has('link')) onclick="window.location.href='{{ Session::get('link') }}'" @endif>
    <p class="mb-0">
        {{ Session::get('message') }}
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
<!-- success message end -->
@endif