@extends('layouts.cplayout')

@section('contents')

        <div class="col-md-12">
           
                <div class="panel-body">
                   
                   <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Department</th>
                                <th>By User</th>
                                <th>Last Updated</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($Articale as $Articale)
                              <tr>
                                <td>{{$Articale->id}}</td>
                                <td>{{$Articale->title}}</td>
                                <td>
                                    {{$Articale->department->name}}
                                </td>
                                <td>{{$Articale->user->name}}</td>
                                <td>{{date('d-m-Y', strtotime($Articale->updated_at))}}</td>
                                <td><a href="/EditArticale/{{$Articale->id}}">Edit</a></td>
                                <td><a href="/AllArticales/{{$Articale->id}}">Delete</a></td>
                              </tr>
                            @endforeach; 
                            </tbody>
                        </table>
                </div>
            </div>
       

@endsection
