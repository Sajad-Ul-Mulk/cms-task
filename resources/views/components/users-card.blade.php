@props(['user'])


<div class="list-group-item">
    <div class="row">
        <div class="col text-truncate">
            <img class="rounded-3" src="{{Storage::url($user->avatar)}}" alt="user avatar " width="50" height="50">
            <p class="text-body d-block">Name :{{$user->name}}</p>
            <p class="text-body d-block">Name :{{$user->email}}</p>

            @can('admin')
                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary bg-red btn-pill w-10 ">Delete</button>
                </form>
            @endcan

        </div>
    </div>
</div>
