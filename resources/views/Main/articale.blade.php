@extends('layouts.main')
@section('Maincontent')
    <div class="col-sm-9">
      
      <h2>{{$Articale->title}}</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by {{$Articale->USer->name}}, {{date('d-m-Y', strtotime($Articale->created_at))}}.</h5>
      
      <h5><span class="label label-danger"><a href="/department/{{$Articale->Department->id}}">{{$Articale->Department->name}}</a></h5>
      <div class="clearfix">
      <img src="../images/{{$Articale->Image->url}}" class="img-rounded" alt="Responsive image" width="100%">
      </div>
      <br>
      <p>{{$Articale->details}}.</p>
      
      <br>
      Tags : 
      <?php
        $tags = $Articale->tage;
        $cats = explode(",", $tags);

        foreach($cats as $cat) {
            $cat = trim($cat);
            echo '<div class="btn btn-success">' . $cat . "</div> ";
        } ?>
<br><br>
      <h4>Leave a Comment:</h4>
      <form class="form-horizontal" e method="POST" action="/CreateComment/{{$Articale->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
          <div class="col-md-12">
              <div class="form-group">
                  <input id="name" type="text" placeholder="Your Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
              </div>
          
              <div class="form-group">
                <textarea class="form-control" name="details" value="{{ old('details') }}" placeholder="Your Comment" rows="3" required></textarea>
              </div>
          </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      @if($Articale->Comment->count() > 0)
      <p><span class="badge">{{$Articale->Comment->count()}}</span> Comments:</p><br>
      @endif
      <div class="row">
      @foreach($Articale->Comment as $co)
        <div class="col-sm-2 text-center">
          <h4>{{$co->name}}</h4>
        </div>
        <div class="col-sm-10">
          <h4><small>{{$co->created_at}}</small> @if (Auth::user()) <small><a href="/deleteComment/{{$co->id}}">delete</a></small> @endif</h4>
          <p>{{$co->details}}</p>
          <br>
        </div>
      @endforeach
      </div>
    </div>
@endsection