<x-layout>
    <p>This is All Posts Page</p>

    <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-pill w-100">
            Create Post
        </a>
    </div>
   <x-status-callback/>

    <div class="container-xl">
        <div class="row row-cards">
            @foreach($posts->reverse() as $post)
                <x-postcard :post="$post"/>
            @endforeach
        </div>
    </div>
    {{$posts->links()}}


</x-layout>

