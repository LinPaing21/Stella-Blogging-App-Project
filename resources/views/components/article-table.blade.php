{{-- Article Management Table --}}
<div id="article" class="container-fluid mt-3 p4">
    <h2 class="text-white text-decoration-underline">Article Table</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-3">Unique Slug</th>
                <th class="col-6">Title</th>
                <th class="col-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th>
                        {{  (request('ap')) ?
                                (($loop->iteration == 10)
                                    ? request('ap') . 0
                                    : request('ap')-1 . $loop->iteration )
                                : $loop->iteration }}
                    </th>
                    <td>{{ $article->slug }}</td>
                    <td><a href="{{ url("/articles/$article->slug") }}" class="text-decoration-none text-white">{{ $article->title }}</a></td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning text-white"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" onclick="return confirm('Are you sure?')" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger rounded-start-0 text-white"><i class="fa fa-trash"  aria-hidden="true"></i> Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}
</div>
