<!DOCTYPE html>
<html>
<head>
    <title></title>
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
       <style>
         .row{
                margin-top:20px;
                margin-left:20px;
                margin-right:20px;
                margin-bottom:20px;
            }
       </style>
     <style>
    img{
      max-width: 100%;
      height: auto;
    }
  </style>
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
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $image->title }}</h1>
      <hr>
         
       </hr>  
       </br>
         @if($image->image)
          <img src="{{ asset($image->image) }}" />
        @endif
    </div>

      <div class="col-md-4">
        <div class="well">
            
            <div class="row">
                <div class="col-md-6">
                    {!! Html::linkRoute('images.edit','EDIT',array($image->id),array('class'=>'btn btn-primary btn-block')) !!}
                 
                </div>
              
                <div class="col-md-6">
                  {!! Form::open(['route'=>['images.destroy',$image->id],'method'=>'DELETE']) !!}
                
                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}

                {!! Form::close() !!}
                </div>
           </div>

        </div>
      </div>         

  </div>
</body>
</html>

