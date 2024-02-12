<!doctype html>
<html lang="en">
<x-head/>
<body>
<script src="{{asset('/dist/js/demo-theme.min.js?1684106062')}}"></script>
<div class="page">
    <!-- Navbar -->
    <x-navbar-image/>
    <x-navbar-menu/>
    <slot name="body-header">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    {{$slot}}
                </div>
            </div>


            <x-footer/>
        </div>
    </slot>
</div>

<script src="./dist/js/tabler.min.js?1684106062" defer></script>
<script src="./dist/js/demo.min.js?1684106062" defer></script>
</body>
</html>
