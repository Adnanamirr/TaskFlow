@if(session('error'))
    <div style="color:red;">
        {{ session('error') }}
    </div>
@endif
