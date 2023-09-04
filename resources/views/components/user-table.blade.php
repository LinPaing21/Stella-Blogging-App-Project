{{-- User Management Table --}}
<div id="user" class="container-fluid mt-3 p4">
    <h2 class="text-white text-decoration-underline">User Table</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-2">Username</th>
                <th class="col-3">Name</th>
                <th class="col-3">Email</th>
                <th class="col-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>
                        {{  (request('up')) ?
                                (($loop->iteration == 10)
                                    ? request('up') . 0
                                    : request('up')-1 . $loop->iteration )
                                : $loop->iteration }}
                    </th>
                    <td>{{ $user->username }}</td>
                    <td><a href="/?author={{ $user->username }}" class="text-decoration-none text-white">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="/admin/users/{{ $user->username }}" method="POST">
                                @csrf
                                @method('patch')
                                <a href="#" class="btn btn-sm btn-warning rounded-end-0 text-white dropdown-toggle {{ ($user->role == 'admin') ? 'disabled' : '' }}"
                                data-bs-toggle="dropdown">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit Role
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <input value="admin" type="button" class="dropdown-item disabled">
                                    <input value="author" name="role" type="submit" class="dropdown-item {{ ($user->role == 'author') ? 'active' : '' }}">
                                    <input value="user" name="role"  type="submit" class="dropdown-item {{ ($user->role == 'user') ? 'active' : '' }}">
                                </div>
                            </form>
                            <form action="{{ route('admin.destroy', $user->username ) }}" onclick="return confirm('Are you sure?')" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="username" value="{{ $user->username }}">
                            <button class="btn btn-sm btn-danger rounded-start-0 text-white {{ ($user->role == 'admin') ? 'disabled' : '' }}"><i class="fa fa-trash"  aria-hidden="true"></i> Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
