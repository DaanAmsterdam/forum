@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
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

                    <replies @added="repliesCount++"
                             @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           Thread Information
                        </div>

                        <div class="card-body">
                            <div class="body">
                                This thread was published {{ $thread->created_at->diffForHumans() }} by
                                <a href="#">{{ $thread->owner->name }}</a> and currently
                                has <span v-text="repliesCount"></span> {{ str_plural('reply', $thread->replies_count) }}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </thread-view>
@endsection