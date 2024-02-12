<x-layout>


    <a href="{{ route('categories.index') }}" class="btn-blue">Back</a>
    <div class="col-md 12">

        <div class="col-md-12">
            <div class="card rounded-5">
                <!-- Photo -->
                <div class="card-body">
                    <h1 class="card-title">Published at:{{date_format($category->created_at,"F j, Y, g:i a")}}</h1>
                    <h1 class="card-title">Title:{{$category->title}}</h1>
                    <h2 class="card-title">Slug:{{$category->slug}}</h2>
                    <hr>
                </div>

                @can('admin')
                    <div class="p-2">
                        <form action="{{ route('categories.destroy',$category->slug) }} " method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary btn-pill w-8">Delete</button>
                        </form>
                    </div>
                @endcan

                <div class="p-2">
                    <a
                        href=" {{ route('categories.edit',$category->slug) }}"
                        class="btn btn-primary btn-pill w-8"
                    >Update</a>
                </div>
            </div>
        </div>

    </div>


</x-layout>
