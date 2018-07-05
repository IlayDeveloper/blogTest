@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Post</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/post/create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" type="content" class="form-control" name="content" value="{{ old('content') }}" required>
                                </textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block"">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categories" class="col-md-4 control-label">Categories</label>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Option 1</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Option 2</label>
                                </div>
                                <div class="checkbox disabled">
                                    <label><input type="checkbox" value="" disabled>Option 3</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="col-md-4 control-label">Tags</label>

                            <div class="col-md-6">
                                <span id="tags"  class="select3-input">
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
