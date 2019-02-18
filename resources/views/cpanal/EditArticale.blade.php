@extends('layouts.cplayout')

@section('contents')

        <div class="col-md-12">
           
                <div class="panel-body">
                    <form class="form-horizontal" e method="POST" action="/EditArticale/{{$articale->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $articale->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Details</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="details" name="details" required autofocus rows="6">{{ $articale->details }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image_id" id="image_id" aria-describedby="fileHelp">
                                @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                               <select class="form-control" name="department_id">
                                    <option value="{{$articale->Department->id}}">{{$articale->Department->name}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tage') ? ' has-error' : '' }}">
                            <label for="tage" class="col-md-4 control-label">Tag</label>

                            <div class="col-md-6">
                                <input id="tage" type="text" class="form-control" name="tage" value="{{ $articale->tage }}" required autofocus>

                                @if ($errors->has('tage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Articale
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       

@endsection
