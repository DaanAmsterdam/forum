@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ route('profile', $thread->owner ) }}">{{ $thread->owner->name }}</a>
                                posted:
                                {{ $thread->title }}
                            </span>

                            @can('update', $thread)
                                <form method="POST" action="{{ $thread->path() }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                            @endcan
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="body">
                            {{ $thread->body }}
                        </div>
                    </div>
                </div>

                <br>

                @foreach ($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @auth
                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
                        @csrf
                        <textarea name="body"
                                  id="body"
                                  class="form-control"
                                  placeholder="Have something to say?"
                                  rows="5">
                        </textarea>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                @endauth

                @guest
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
                @endguest
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                       Thread Information
                    </div>

                    <div class="card-body">
                        <div class="body">
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->owner->name }}</a> and currently has {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection