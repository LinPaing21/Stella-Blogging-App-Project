{{-- Category Management Table --}}
<div id="category" class="container-fluid my-3 p4">
    <h2 class="text-white text-decoration-underline">Category Table</h2>
    <div class="row">
        <div class="col-12 col-lg-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th class="col-4">#</th>
                        <th class="col-4">Unique Slug</th>
                        <th class="col-4">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 col-lg-6">
            <h5 class="text-white">Add New Category</h5>
            <form action="/admin/category/add" method="POST" class="border rounded bg-white">
                @csrf

                    <input name="name" id="addCategory" rows="2" class="form-control bg-white" placeholder="New Category..." required>
                    @error('body')
                        <span class="text-danger" role="alert">
                                *<small>{{ $message }}</small>
                        </span>
                    @enderror
                    <div class="float-end mt-2">
                            <button type="button" onclick="clearCommentValue()" class="btn btn-sm btn-light rounded-pill">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary rounded-pill">Add</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script>
        // Function to clear the comment value
        function clearCommentValue() {
            var commentBody = document.getElementById("addCategory");
            commentBody.value = "";
        }
    </script>
@endsection
