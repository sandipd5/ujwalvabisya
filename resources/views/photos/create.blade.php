<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/home">ujwal vabisya</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{route('photos.index')}}">Image</a></li>
              
            </ul>
          </div>
      </nav>
 
  <div class="col-md-8 col-md-offset-2">
     <hr>
            {!!Form::open(array('route' => 'photos.store','files' => 'true')) !!}
            {{form::label('title','Title:')}}
            {{form::text('title',null,array('class'=>'form-control')) }}
            <br>

            {{Form::label('picture','upload image:')}}
            {{Form::file('picture',null,array('class'=>'form-control'))}}

            <br>
            <br>
            {{form::submit('create post',array('class'=>'btn btn-success btn-lg btn-block'))}}
             
           {!! Form::close() !!}
          </hr>  
  </div>


</body>
</html>
