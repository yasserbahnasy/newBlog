@extends('layouts.cplayout')

@section('contents')

        <div class="col-md-12">
           
                <div class="panel-body">
                   
                   <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($Department as $Department)
                              <tr>
                                <td>{{$Department->id}}</td>
                                <td>{{$Department->name}}</td>
                                <td>{{date('d-m-Y', strtotime($Department->created_at))}}</td>
                                <td><a href="/EditDepartment/{{$Department->id}}">Edit</a></td>
                                <td><a href="/AllDepartments/{{$Department->id}}">Delete</a></td>
                              </tr>
                            @endforeach; 
                            </tbody>
                        </table>
                </div>
            </div>
       

@endsection
