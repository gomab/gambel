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
                      <td><img src="{{$post->featured}}" alt="{{ $post->title }}" width="90px" height="50px"></td>
                      <td>{{ $post->title }}</td>

                      <td>
                              <span>edit</span>
                          </a>
                      </td>

                      <td>

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