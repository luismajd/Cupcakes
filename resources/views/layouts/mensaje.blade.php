@if(Session::has('mensaje'))
<div class="alert alert-dismissible alert-dark" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        {{ Session::get('mensaje') }}
    </button>
</div>
@endif
