@if(Session::has('message'))
    <div class="alert alert-success dismissible">
        {{Session::get('message')}}
    </div>
@endif