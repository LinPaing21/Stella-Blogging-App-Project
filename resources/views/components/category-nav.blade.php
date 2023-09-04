<li class="nav-item mt-3">
    <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">
        Categories
    </h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-light"><a href="/articles" class="text-decoration-none"><b>All</b></a></li>
        @foreach ($categories as $category)
            <li class="list-group-item list-group-item-light">
                <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->only(['search', 'author'])) }}" class="text-decoration-none">
                    <b>{{ $category->name }}</b>
                </a>
            </li>
        @endforeach
    </ul>
</li>
