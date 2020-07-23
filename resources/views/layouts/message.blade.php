@if($message = Session::get('success'))
<div class="alert alert-success">
    <button data-dismiss="alert" class="close">
        ×
    </button>
    <i class="fa fa-check-circle"></i>
    {{$message}}
</div>
@endif