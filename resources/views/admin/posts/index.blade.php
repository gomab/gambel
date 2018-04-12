@extends('layouts.app')


@section('content')
  <div class="card">
      <div class="card-header">
          Post - index (Published Posts)
      </div>
      <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Image</th>
              <th>Title</th>
              <th>Edit</th>
              <th>Restore</th>
              </thead>
              <tbody>
              @if($posts->count() > 0)
                  @foreach($posts as $post)
                      <tr>
                          <td><img src="{{$post->featured}}" alt="{{ $post->title }}" width="90px" height="50px"></td>
                          <td>{{ $post->title }}</td>

                          <td>
                              <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-sm">
                                  <span>Edit</span>
                              </a>
                          </td>

                          <td>
                              <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">
                                  <span>Trash</span>
                              </a>
                          </td>
                      </tr>
                  @endforeach
                @else
                  <th colspan="5" class="text-center">Aucun post publié</th>
              @endif

              </tbody>
          </table>
      </div>
  </div>

@stop