@props(['category'])

<div class="list-group-item">
    <div class="row">
        <div class="col text-truncate">
            <a href="{{ route('categories.show',$category->slug) }}" class="text-body d-block">{{$category->title}}</a>
        </div>
    </div>
</div>
