@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{ $activity->subject->favoritable->path() }}">
            {{ $profileUser->name }} favorited a reply.
        </a>
    @endslot

    @slot('body')
        {{ $activity->subject->favoritable->body }}
    @endslot
@endcomponent

