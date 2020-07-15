@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts --><link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  </head>
    <body>
      <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    MyLocation
                </div>
                自分の好きな場所を記録しよう！
            </div>
            </div>

<!--

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/storage/1.png" class="img-responsive">
    </div>
    <div class="carousel-item">
      <img src="/storage/2.png" class="img-responsive">
    </div>
    <div class="carousel-item">
      <img src="/storage/3.png" class="img-responsive">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    ＜
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    ＞
  </a>
</div>-->
</div>
</body>

</html>
@endsection
