<aside class="col-2 position-fixed my-3">
    <nav class="pe-3">
        <div class="list-group text-center text-lg-start">
            <span class="list-group-item disabled d-none d-lg-block">
                <small>CONTROLS</small>
            </span>
            <a href="#dashboard" class="list-group-item list-group-item-action active">
                <i class="fa-solid fa-house"></i>
                <span class="d-none d-lg-inline">Dashboard</span>
            </a>
            <a href="#user" class="list-group-item list-group-item-action">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="d-none d-lg-inline">Users</span>
                <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{ $user_count }}</span>
            </a>
            <a href="#article" class="list-group-item list-group-item-action">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span class="d-none d-lg-inline">Articles</span>
                <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{ $article_count }}</span>
            </a>
            <a href="#category" class="list-group-item list-group-item-action">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span class="d-none d-lg-inline">Categories</span>
            </a>
            {{-- I hardcoded this and need to add feature --}}
            <a href="#report" class="list-group-item list-group-item-action">
                <i class="fa fa-flag-o" aria-hidden="true"></i>
                <span class="d-none d-lg-inline">Reports</span>
                <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">20</span>
            </a>
        </div>
    </nav>
</aside>
