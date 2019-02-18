@extends('layouts.cplayout')

@section('contents')

        <div class="col-md-12">
           
                <div class="panel-body">
                   
                   <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user)
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>

                                <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                                <td><a href="/EditUser/{{$user->id}}">Edit</a></td>
                                <td><a href="/AllUsers/{{$user->id}}">Delete</a></td>
                              </tr>
                            @endforeach; 
                            </tbody>
                        </table>
                </div>
            </div>
       

@endsection
