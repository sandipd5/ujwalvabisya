<!DOCTYPE html>
<html>
  <head>
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
  </head>

  <body>
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/home">ujwal vabisya</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{route('blogs.index')}}">Blog</a></li>
             
            </ul>
          </div>
      </nav>
    <div class="row">

      {!!Form::model($blog,['route'=>['blogs.update',$blog->id],'method'=>'PUT','files' => 'true'])!!}

      <div class="col-md-8">
          {{form::label('title','Title:')}}
          {{ form::text('title',null,["class"=>'form-control']) }}
          <br>
          <br>
           {{Form::label('image','upload image:')}}
           {{Form::file('image',null,array('class'=>'form-control'))}}
          <br>
           <br>
           {{form::label('body','post body:')}}

           {{ form::textarea('body',null,["class"=>'form-control']) }}
          
      </div>

          <div class="col-md-4">
            <div class="well">
              
              <div class="row">
                <div class="col-md-6">
                  {!! Html::linkRoute('blogs.show','cancel',array($blog->id),array('class'=>'btn btn-primary btn-block')) !!}
                  
                </div>
                <div class="col-md-6">
                  {{Form::submit('save changes',['class'=>'btn btn-success btn-block'])}}
                  
                </div>  
              </div>
            </div>
        </div>
    {!!Form::close()!!} 
  </div>
</body>
</html>

