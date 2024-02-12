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
            <form class="card card-md" action=" {{ route('users.update',$CurrentUser->id) }}" method="post"
                  enctype="multipart/form-data" autocomplete="off" novalidate>
                @csrf
                @method('PATCH')
                <x-status-callback/>

                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Your Profile</h2>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$CurrentUser->name}}"
                               placeholder="Enter name">
                        @error('name')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" readonly name="email" class="form-control" placeholder="Enter email"
                               value="{{$CurrentUser->email}}">
                        @error('email')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <img src="{{Storage::url($CurrentUser->avatar)}}" width="120" height="120"
                         class="rounded-4 m-lg-2 ">

                    <div class="mb-3">
                        <label class="form-label">Upload Avatar</label>
                        <div class="input-group input-group-flat">
                            <input type="file" name="avatar" class="form-control" placeholder="Avatar"
                                   autocomplete="off">

                            @error('password')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                Already have account? <a href="{{ route('sessions.store') }}" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>

    </body>
    </html>

</x-layout>
