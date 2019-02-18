@extends('layouts.main')
@section('Maincontent')
                        <div class="col-sm-9">
                          <h4>Articale For Department : {{$Department->name}}</h4>
                          <hr>
                          @foreach($Department->articale as $ar)
                          <h2><a href="/articale/{{$ar->id}}">{{$ar->title}}</a></h2>
                          <h5><span class="glyphicon glyphicon-time"></span> Post by {{$ar->USer->name}}, {{date('d-m-Y', strtotime($ar->created_at))}}.</h5>
                          <h5><span class="label label-danger"><a href="/department/{{$Department->id}}">{{$ar->Department->name}}</a></h5><br>

                          <div class="clearfix">
                          <a href="/articale/{{$ar->id}}"><img src="../images/{{$ar->Image->url}}" class="img-thumbnail pull-left" alt="..." width="304" height="236"></a>
                          

                          <div class="col-md-offset-5">
                          <p>
                          {{@substr($ar->details,0,250).' ...'}}
                          </p>
                          <a href="/articale/{{$ar->id}}"><button type="button" class="btn btn-default">Read More</button></a>
                          
                          </div>
                          </div>
                          <hr>
                          @endforeach
                          
                        </div>
 @endsection
                      

