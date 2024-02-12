
<x-layout>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
    </head>
    <body  class=" d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <form class="card card-md" action="{{ route('categories.update', $category->slug) }} {{--/Category/{{$category->id}}--}}" method="post" autocomplete="off" novalidate>
                @csrf
                @method('PATCH')
                <x-status-callback/>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Update category</h2>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input
                            type="text"
                            name='title'
                            class="form-control"
                            value="{{$category->title}}"
                            placeholder="Enter title">
                    </div>
                    @error('title')
                    {{ $message }}
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <textarea
                            type="text"
                            name='slug'
                            class="form-control"
                            placeholder="Enter slug">{{$category->slug}}</textarea>
                    </div>
                    @error('slug')
                    {{ $message }}
                    @enderror


                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Update Category</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    </body>
    </html>
</x-layout>
