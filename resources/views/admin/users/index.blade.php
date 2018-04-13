@extends('layouts.app')


@section('content')
  <div class="card">
      <div class="card-header">
          Users - index
      </div>
      <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Image</th>
              <th>Name</th>
              <th>Permissions</th>
              <th>Delete</th>
              </thead>
              <tbody>
              @if($users->count() > 0)
                  @foreach($users as $user)
                      <tr>
                          <td><img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name}}" width="60px" height="60px" style="border-radius: 50%;"></td>
                          <td>{{ $user->name }}</td>
                          <td>
                             @if($user->admin)
                                  <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Remove permissions</a>
                              @else
                                  <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Make admin</a>
                             @endif
                          </td>

                          <td>
                             @if(Auth::id() !== $user->id)
                                  <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                             @endif
                          </td>
                      </tr>
                  @endforeach
                @else
                  <th colspan="5" class="text-center">Aucun User</th>
              @endif

              </tbody>
          </table>
      </div>
  </div>

@stop