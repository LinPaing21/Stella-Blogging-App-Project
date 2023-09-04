@props(['article'])

<ul class="list-group my-3">
    <li class="list-group-item active">
    <b>Comments ({{ $article->comments->count() }})</b>
    </li>
    @foreach ($article->comments as $comment)
        <li class="list-group-item">
            <div class="row">
                <div class="col-1">
                    <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="50" height="50" class="rounded">
                </div>
                <div class="col-10">
                    <b class="">{{ $comment->user->name }}</b><span class="small ms-2">{{ $comment->created_at->diffForHumans() }}</span>
                    <p class="fw-light mb-0" id="comment-body{{ $comment->id }}">{{ $comment->body }}</p>
                     <!-- when edit it change to input form -->
                    <form id="edit-comment{{ $comment->id }}" action="/articles/{{ $article->slug }}/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('patch')
                        @error('body')
                            <span class="text-danger" role="alert">
                                *<small>{{ $message }}</small>
                            </span>
                        @enderror
                        <div class="float-end mt-2 d-none" id="confirm-btn{{ $comment->id }}">
                            <button type="button" onclick="cancelInput({{ $comment->id }})" class="btn btn-sm btn-outline-secondary rounded-pill">Cancel</button>
                            <button type="button" onclick="validateValue({{ $comment->id }})" class="btn btn-sm btn-outline-primary rounded-pill">Save</button>
                        </div>
                    </form>
                </div>
                @auth
                   <div class="col-1 d-flex align-items-center" id="btns{{ $comment->id }}">
                        <div class="dropdown">
                            <a class="btn rounded-circle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                &#8942;
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-flag" aria-hidden="true"></i> Report</a></li>
                                @if (auth()->user()->id == $comment->user_id || auth()->user()->id == $article->user->id || auth()->user()->can('admin'))
                                    <li><button class="dropdown-item" onclick="inputBox({{ $comment->id }})"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></li>
                                    <li>
                                        <form action="/articles/{{ $article->slug }}/comments/{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endauth

            </div>
        </li>
    @endforeach
</ul>
