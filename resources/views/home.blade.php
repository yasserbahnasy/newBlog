@extends('layouts.Main')
@section('Maincontent')
                        <div class="col-sm-9">
                          <h4><small>RECENT POSTS</small></h4>
                          <hr>
                          @foreach($Articale as $Articale)
                          <h2><a href="/articale/{{$Articale->id}}">{{$Articale->title}}</a></h2>
                          <h5><span class="glyphicon glyphicon-time"></span> Post by {{$Articale->USer->name}}, {{date('d-m-Y', strtotime($Articale->created_at))}}.</h5>
                          
                          <h5><span class="label label-danger"><a href="/department/{{$Articale->Department->id}}">{{$Articale->Department->name}}</a></h5><br>
                          <div class="clearfix">
                          <a href="/articale/{{$Articale->id}}"><img src="images/{{$Articale->Image->url}}" class="img-thumbnail pull-left" alt="..." width="304" height="236"></a>
                          

                          <div class="col-md-offset-5">
                          <p>
                          {{@substr($Articale->details,0,250).' ...'}}
                          </p>
                          <a href="/articale/{{$Articale->id}}"><button type="button" class="btn btn-default">Read More</button></a>
                          
                          </div>
                          </div>
                          <hr>
                          @endforeach
                          
                        </div>
 @endsection
                      

