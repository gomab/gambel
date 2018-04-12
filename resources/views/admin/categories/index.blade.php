@extends('layouts.app')


@section('content')
  <div class="card">
      <div class="card-header">
          Category - index
      </div>
      <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Category name</th>
              <th>Edit</th>
              <th>Delete</th>
              </thead>
              <tbody>
              @if($categories->count() > 0)
                  @foreach($categories as $category)
                      <tr>
                          <td>{{ $category->name }}</td>

                          <td>
                              <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-xs">
                                  <span>edit</span>
                              </a>
                          </td>

                          <td>
                              <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-info btn-xs">
                                  <span>delete</span>
                              </a>
                          </td>
                      </tr>
                  @endforeach
                @else
                  <th colspan="5" class="text-center">Aucune catégorie</th>
              @endif

              </tbody>
          </table>
      </div>
  </div>

@stop