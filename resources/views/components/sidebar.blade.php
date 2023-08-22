<nav class="col-md-3 mt-2 d-md-block p-2 bg-white rounded" style="position: sticky; height: 500px; top: 5rem; align-self: flex-start; overflow-y: scroll;">
    <!-- Sidebar content here -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <form method="GET" action="/" class="form-group input-group">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit"><span class="fa fa-search"></span></button>
            </form>
        </li>
        <!-- Categories -->
        <x-category-nav/>

    </ul>
</nav>
