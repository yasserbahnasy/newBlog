@extends('layouts.cplayout')

@section('contents')

        <div class="col-md-12">
           
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="newDepartment">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add New Department
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       

@endsection
