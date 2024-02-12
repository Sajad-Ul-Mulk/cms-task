
<x-layout>
<html lang="en">

<body  class=" d-flex flex-column">
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="" class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{route('categories.store')}}" method="post" autocomplete="off" >
           @csrf
            <x-status-callback/>
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create new category</h2>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name='title' class="form-control" placeholder="Enter title">
                </div>
                @error('title')
                    {{ $message }}
                @enderror
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name='slug' class="form-control" placeholder="Enter slug">
                </div>
                @error('slug')
                   {{ $message }}
                @enderror

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Create new Category</button>
                </div>
            </div>
        </form>

    </div>
</div>

</body>
</html>
</x-layout>
