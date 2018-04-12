@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>

    @endif


    <div class="card">
        <div class="card-header">
            Edit post | <strong>{{ $post->title }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>


                <div class="form-group">
                    <label for="category_id">Select a category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option {{ $category->id == $post->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name  }}</option>
                        @endforeach    
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label><br>
                    @foreach($tags as $tag)
                        <div class="form-check-inline">
                            <label for=""><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   @foreach($post->tags as $t)
                                        @if($tag->id == $t->id)
                                            checked
                                        @endif
                                   @endforeach
                                >{{ $tag->tag }}
                            </label>

                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control-file" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" cols="5" rows="5" class="form-control">
                        {{ $post->content }}
                    </textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update post
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop