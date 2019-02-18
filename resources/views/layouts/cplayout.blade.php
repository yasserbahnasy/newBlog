@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Control Panal Page</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            <ul class="nav nav-pills">
                                <li><a href="/newArticale">Add New Artical</a></li>
                                <li><a href="/AllArticales">All Articals</a></li>
                                <li><a href="/newDepartment">Add New Department</a></li>
                                <li><a href="/AllDepartments">All Departments</a></li>
                                <li><a href="/createUser">Add New Users</a></li>
                                <li><a href="/AllUsers">All Users</a></li>
                                <li><a href="/Setting">Websit Setting</a></li>
                            </ul>

                        @yield('contents')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
