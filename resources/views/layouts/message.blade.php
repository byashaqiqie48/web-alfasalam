@if($message = Session::get('success'))
<div class="alert alert-success">
        <button data-dismiss="alert" class="close">
            ×
        </button>
        <i class="fa fa-check-circle"></i>
        {{$message}}
    </div>
@endif
@if($message = Session::get('failed'))
<div class="alert alert-danger">
        <button data-dismiss="alert" class="close">
            ×
        </button>
        <i class="fa fa-times-circle"></i>
        {{$message}}
    </div>     
@endif
@if($message = Session::get('warning'))
<div class="alert alert-warning">
        <button data-dismiss="alert" class="close">
            ×
        </button>
        <i class="fa fa-exclamation-circle"></i>
        {{$message}}
    </div>     
@endif
@if ($errors->any())
    <div class="alert alert-danger">
            <button data-dismiss="alert" class="close">
                    ×
                </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
