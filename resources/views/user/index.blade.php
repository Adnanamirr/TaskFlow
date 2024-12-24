
<ol>
@foreach ($users as $user)
    <div>
        <li>{{$user->name}}</li>

    </div>
    @endforeach
</ol>
