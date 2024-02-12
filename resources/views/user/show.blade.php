<x-layout>


    <p><strong>{{auth()->user()->email}}'s</strong> Dashboard</p>


    <div class="container-xl">
        <div class="row row-cards">
            <x-status-callback/>

        @if(!count($posts))
                <p>No Post Found for {{auth()->user()->email}}</p>
                <x-CreatePostButton/>
            @endif
            <x-BackButton/>
            @foreach($posts as $post)
                <x-postcard :post="$post"/>
            @endforeach
        </div>
    </div>

</x-layout>

