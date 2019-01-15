@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Thread</div>

                    <div class="card-body">
                        <form method="POST" action="/threads">
                            @csrf

                            <div class="form-group">
                                <label for="channel_id">Choose a Channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control{{ $errors->has('channel_id') ? ' is-invalid' : '' }}" required>
                                    <option value="">Choose one...</option>
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       id="title"
                                       name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group is">
                                <label for="body">Body:</label>
                                <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                                          id="body"
                                          name="body"
                                          rows="8" required>{{ old('body') }}</textarea>
                            </div>

                            @if (count($errors))
                                <div class="form-group">
                                    <ul>
                                        @foreach ( $errors->all() as $error )
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-primary">
                                    Publish
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
