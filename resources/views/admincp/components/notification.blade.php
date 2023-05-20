@if(session('notification'))
    <div class="altert alert-warning" role="alert">
        {{session('notification')}}
    </div>
@endif
