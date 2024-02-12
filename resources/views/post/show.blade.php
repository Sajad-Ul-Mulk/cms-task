<x-layout>


    <a href="{{ route('posts.index') }}" class="btn-blue">Back</a>
    <div class="col-md 12">

        <div class="col-md-12">
            <div class="card rounded-5">
                <!-- Photo -->
                <div class="card-body">
                    <h1 class="card-title">Published at:{{date_format($SelectedPost->created_at,"F j, Y, g:i a")}}</h1>
                    <h1 class="card-title">Title:{{$SelectedPost->title}}</h1>
                    <h2 class="card-title">Category:{{$SelectedPost->category->title}}</h2>
                    <h3 class="card-title">Description:{{$SelectedPost->description}}</h3>
                    <hr>
                </div>
                <div>
                    <img src='https://i.pravatar.cc/60?u={{$SelectedPost->id}}' width="50" height="50"
                         class="m-auto mt-1 rounded-4"><br>
                    Post tailored By: <strong>{{$SelectedPost->user->name}}</strong><br>
                    Email:<strong>{{$SelectedPost->user->email}}</strong>

                </div>
            </div>
        </div>


    </div>


</x-layout>
