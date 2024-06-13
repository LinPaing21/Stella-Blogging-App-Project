<div>
    @auth
        <form class="border rounded bg-white">
            <div class="mb-2 row px-3 pt-3">
                <div class="col-1">
                    <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="50" height="50"
                        class="rounded">
                </div>
                <div class="col-11">
                    <textarea wire:model.lazy="body" name="body" id="addComment" rows="2" class="form-control bg-white"
                        placeholder="Write a comment..." required></textarea>
                    @error('body')
                        <span class="text-danger" role="alert">
                            *<small>{{ $message }}</small>
                        </span>
                    @enderror
                    <div class="float-end mt-2">
                        <button type="button" onclick="clearCommentValue()"
                            class="btn btn-sm btn-outline-secondary rounded-pill">Cancel</button>
                        <button wire:click.prevent="addComment()"
                            class="btn btn-sm btn-outline-primary rounded-pill">
                            <span>Comment</span><span wire:loading wire:target="addComment">ing...</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <p class="text-center">&#8226; <a href="/login">Login</a> or <a href="/register">Register</a> to participate in
            comment
            section.</p>
    @endauth

    <ul class="list-group my-3">
        <li class="list-group-item active">
            <b>Comments ({{ $comments->count() }})</b>
        </li>
        @foreach ($comments as $comment)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-1">
                        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="50"
                            height="50" class="rounded">
                    </div>
                    <div class="col-10">
                        <b class="">{{ $comment->user->name }}</b><span
                            class="small ms-2">{{ $comment->created_at->diffForHumans() }}</span>
                        <p class="fw-light mb-0" id="comment-body{{ $comment->id }}">{{ $comment->body }}</p>
                        <!-- when edit it change to input form -->
                        <form id="edit-comment{{ $comment->id }}">
                            <div class="float-end mt-2 d-none" id="confirm-btn{{ $comment->id }}">
                                <button type="button" onclick="cancelInput({{ $comment->id }})"
                                    class="btn btn-sm btn-outline-secondary rounded-pill">Cancel</button>
                                <button type="button" onclick="validateValue({{ $comment->id }})"
                                    class="btn btn-sm btn-outline-primary rounded-pill">
                                    <span wire:loading.remove>Save</span>
                                    <span wire:loading>Saving...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    @auth
                        <div class="col-1 d-flex align-items-center" id="btns{{ $comment->id }}">
                            <div class="dropdown">
                                <a class="btn rounded-circle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    &#8942;
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-flag"
                                                aria-hidden="true"></i>
                                            Report</a></li>
                                    @if (auth()->user()->id == $comment->user_id || auth()->user()->id == $article->user->id || auth()->user()->can('admin'))
                                        <li>
                                            <button class="dropdown-item" onclick="inputBox({{ $comment->id }})">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item"
                                                wire:click="deleteComment({{ $comment }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                <span>Delete</span><span wire:loading wire:target="deleteComment">ing...</span>
                                            </button>
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
</div>
