@if (  $message = Session::get("success"))
    <div class="card_message">
        <p>{{$message}}</p>
    </div>
@endif


@if (  $message = Session::get("danger"))
    <div class="card_message">
        <p>{{$message}}</p>
    </div>
@endif
