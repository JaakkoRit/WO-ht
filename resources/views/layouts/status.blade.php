@if(session('status'))
    <hr>
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif