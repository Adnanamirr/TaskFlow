
<ul>
@foreach ($users as $user)
    <div>
        <a href="{{ route('user.show', ['id' => $user->id]) }}">
            {{ $user->name }}
        </a>

    </div>
    @endforeach
    </ul>
