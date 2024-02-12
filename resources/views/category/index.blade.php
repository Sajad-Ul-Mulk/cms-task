<x-layout>
    <p>This is Top Categories</p>



    <div class="col-12">
        <x-AddCategoryButton class="mx-xxl-auto"/>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>
            <x-status-callback/>

            <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">

                @foreach($categories->reverse() as $category)
                    <x-category-card :category="$category"/>
                @endforeach

            </div>
        </div>
    </div>



</x-layout>

