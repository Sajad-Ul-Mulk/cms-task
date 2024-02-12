<x-layout>


    <div class="col-12">
        <x-status-callback/>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>


            </div>
            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">

                @foreach($users->reverse() as $user)
                    <x-users-card :user="$user"/>
                @endforeach

            </div>
        </div>
    </div>


</x-layout>

