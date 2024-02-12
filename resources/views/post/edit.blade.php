@php use App\Models\Category; @endphp
<x-layout>

    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>Sign up - Tabler - Premium and Open Source dashboard template with responsive and high quality
            UI.</title>

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
    <body class=" d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <form class="card card-md" action=" {{ route('posts.update',$post->slug) }}" method="post"
                  enctype="multipart/form-data" autocomplete="off" novalidate>
                <x-status-callback/>
                @csrf
                @method('patch')
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Edit Post</h2>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Enter name"
                               value="{{$post->title}}"
                        >
                        @error('title')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text"
                               name="slug"
                               class="form-control"
                               placeholder="Enter name"
                               value="{{$post->slug}}"
                        >
                        @error('slug')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control"
                                  name="description"
                                  data-bs-toggle="autosize"
                                  placeholder="Type something…"
                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 60px;">{{$post->description}}</textarea>

                        @error('description')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Upload Cover Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>


                    <div class="mb-3">
                        @php
                            $categories=Category::all();
                        @endphp

                        <div class="form-label">Select Category</div>
                        <select class="form-select" name="SelectedCategory">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-footer">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    </body>
    </html>
</x-layout>
