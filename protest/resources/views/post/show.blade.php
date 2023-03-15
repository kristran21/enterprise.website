@extends('layouts.app')
@section('content')
    <div class="container ps-5 pe-5">
        <div class="row g-3 p-5">
            <div class="col-md-4 offset-md-1">
                <div>
                    <div class="d-flex">
                    <div>
                        <img src="{{ asset('img/logo-RRK.png') }}" alt=""
                        class="rounded-circle" style="max-width: 50px">
                    </div>
                        <div class="ps-3 pt-2 fs-5 fw-bold"><a href="">
                                <span class="text-danger"> {{ $post->author }}</span></a>
                        </div>
                        @if(Auth::User()->id == $post->user_id)
                            <a href="{{ ('/post/edit/') }}{{ $post->id }}" class="ps-5">Edit idea</a>
                        @endif
                        <p class="ps-3">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="pt-2 fs-5">{{ $post->content }}</p>
                </div>
                @php
                    $now = Illuminate\Support\Carbon::now()->format('Y-m-d');
                    $close = App\Models\Close::find(1);
                    $date = $close->closure_date;
                @endphp

                        @if(!$date >= $now)
                            <h3 class="text-danger">You can't comment rightnow</h3>
                        @else
                            <div class="border border-2 p-3">
                                <h4>Write Comments</h4>
                                <div class="mb-3">
                                    <form action="{{ route('comment.store', $post->id) }}" method="post">
                                        @csrf
                                        <div class="mb-3">

                                            <label for="writer" class="col-md-4 col-form-label">{{ __('Writer name') }}</label>

                                            <select id="writer" name="writer" class="form-select" aria-label="Default select example">
                                                <option value="{{ __('anonymous') }}">
                                                    Anonymous
                                                </option>
                                                <option value="{{ Auth::user()->username }}">
                                                    {{ Auth::user()->username }}
                                                </option>
                                            </select>
                                            <div class="pt-2">
                                                <textarea name="comment" class="form-control" rows="3" autofocus></textarea>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-4">
                                            <div class="row justify-content-center pt-1">
                                                <div>
                                                    <button type="submit" class="btn btn-success">Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                @endif
                <div class="pt-md-2">
                <div class="border border-3 p-md-2">
                    @php
                        $comment = \App\Models\Comment::where('post_id', $post->id)
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(3);
                    @endphp
                    <div class="d-flex ">
                        <div class="mr-auto p-2">
                            <h4>Comments ({{ $post->comments->count() }})</h4>
                        </div>
                    </div>
                    @foreach($comment as $cmt)
                        <div class="border boder-2 p-md-1">
                        <p1 class="text-danger fw-bold"><a href="">{{ $cmt->writer }}</a></p1> <br>
                        <p1>{{ $cmt->comment }}</p1> <br>
                        </div>
                    @endforeach
                    <div class="col-12 d-flex justify-content-center">
                    <div class="ps-2">
                        {{ $comment->links() }}
                    </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-6 offset-md-1 pt-2 ">
                <iframe src="/storage/{{ $post->file }}" alt="" height="600" class="w-100">
                </iframe>
                <div class="d-flex justify-content-center pt-md-3">
                    @if($post->likeBy(auth()->user()))
                        <form action="{{ route('post.likes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-warning">Unlike</button>
                        </form>
                    @elseif($post->dislikeBy(auth()->user()))
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-warning">Undislike</button>
                        </form>
                    @else
                        <form action="{{ route('post.likes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-info">Like</button>
                        </form>
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">Dislike</button>
                        </form>
                    @endif

                    <span class="p-md-2">{{ $post->likes->count() }} {{ Str::plural('like', $post
                                -> likes->count()) }}</span>
                    <span class="p-md-2">{{ $post->dislikes->count() }} {{ Str::plural('dislike', $post
                                -> dislikes->count()) }}</span>
                </div>
            </div>
        </div>

    </div>
@endsection
