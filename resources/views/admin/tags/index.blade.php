@extends('layouts.app')


@section('content')
  <div class="card">
      <div class="card-header">
          Tags - index | Show
      </div>
      <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Tag name</th>
              <th>Edit</th>
              <th>Delete</th>
              </thead>
              <tbody>
              @if($tags->count() > 0)
                  @foreach($tags as $tag)
                      <tr>
                          <td>{{ $tag->tag }}</td>

                          <td>
                              <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info btn-xs">
                                  <span>edit</span>
                              </a>
                          </td>

                          <td>
                              <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-info btn-xs">
                                  <span>delete</span>
                              </a>
                          </td>
                      </tr>
                  @endforeach
                @else
                  <th colspan="5" class="text-center">Aucun Tag</th>
              @endif

              </tbody>
          </table>
      </div>
  </div>

@stop