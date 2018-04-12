@extends('layouts.app')


@section('content')
  <div class="card">
      <div class="card-header">
          Post - index
      </div>
      <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Image</th>
              <th>Title</th>
              <th>Edit</th>
              <th>Delete</th>
              </thead>
              <tbody>
              @foreach($posts as $post)
                  <tr>
                      <td>image</td>
                      <td>{{ $post->title }}</td>

                      <td>
                          <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs">
                              <span>edit</span>
                          </a>
                      </td>

                      <td>
                          <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-info btn-xs">
                              <span>delete</span>
                          </a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
  </div>

@stop