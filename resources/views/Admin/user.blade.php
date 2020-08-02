@extends('Admin.layout.main')

@section('title')
  Users Page
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-success">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th class="text-dark text-center">
                      <b><strong>Name</strong></b>
                    </th>
                    <th class="text-dark text-center">
                      <b><strong>Email</strong></b>
                    </th>
                    <th class="text-dark text-center">
                      <b><strong>User Type</strong></b>
                    </th>
                    <th class="text-dark text-center">
                      <b><strong>Actions</strong></b>
                    </th>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td class="text-dark text-center">
                          {{ $user->name }}
                        </td>
                        <td class="text-dark text-center">
                          {{ $user->email }}
                        </td>
                        <td class="text-dark text-center">
                          <?php
                                if($user->user_type == 1){
                                  $user1 = 'ADMIN';
                                }
                                else{
                                  $user1 = 'USER';
                                }
                          ?>
                          {{ $user1 }}
                        </td>
                        <td class="text-dark text-center">
                        <a class="text-dark" href="{{ route('user.edit', ['id'=> $user->id]) }}">
                          <button type="button" class="btn btn-sm btn-warning">Edit</button>
                        </a>
                        <a class="text-dark" href="{{ route('user.delete',['id' => $user->id]) }}">
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </a> 
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection('content')