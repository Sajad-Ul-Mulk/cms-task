@php use Illuminate\Support\Facades\Storage; @endphp
@props(['post'])


<div class="col-md-6">

    <div class="card">
        <div class="card-header">
            <div>
                <div class="row align-items-center">
                    <div class="col-auto">

                        <img src='{{Storage::url($post->user->avatar) ?? "https://i.pravatar.cc/60?u={$post->id}"}} '
                             width="60" height="60" class="rounded-3">
                    </div>
                    <div class="col">
                        <div class="card-title">{{$post->user->name}}</div>
                        <div class="card-subtitle">{{$post->category->title}}</div>
                    </div>
                </div>
            </div>
            <div class="card-actions">


                <div class="btn">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                        <path d="M3 7l9 6l9 -6"></path>
                    </svg>
                    {{$post->user->email}}
                </div>
            </div>
        </div>
        <div class="card-body ">
            <a href=" {{ route('posts.show',$post->slug) }}" class="text-black">
                @if($post->photo)
                    <img src="{{Storage::url($post->photo)}}" class=" m-lg-3 rounded-3">
                @endif
                <h3 class="mt-1">Title: {{$post->title}}</h3>
                <p class='mt-4 p-1 large'>{{$post->slug}}</p>


                @can('admin')
                    <form action="{{ route('posts.destroy',$post->slug) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary btn-pill w-10 ">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit',$post->slug) }} " class="btn btn-primary btn-pill w-10 ">Edit</a>
                @else
                    @if(Auth::id()===$post->user_id)
                        <a href="{{ route('posts.edit',$post->slug) }} " class="btn btn-primary btn-pill w-10 ">Edit</a>
                    @endif
                @endcan


            </a>

        </div>
    </div>
</div>

