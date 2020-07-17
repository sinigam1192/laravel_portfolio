@extends('layouts.app')
<head>
  <style type="text/css">
  #map{
    width: 1800px;
    height: 400px;
    max-width: 100%;
  }
  </style>
</head>
@section('content')
<h1>location_edit</h1>
<div class="container">
   <form action="{{ url('/users/locations'.$location->id.'') }}" method="post">
     @csrf
       @method('PUT')
       <div class="form-group">
         <label for="title">{{ __('Title') }}</label>
         <input id="title" type="text" class="form-control" name="title" value="{{ $location->title }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="content">{{ __('content') }}</label>
            <textarea id="content" class="form-control" name="content" required>{{ $location->content }}</textarea>
        </div>
        <div class="form-group">
          <label>lat</label><br>
            <input class="form-control" id = "lat" type="text" name="lat" value="{{ $location->latitude }}" required />
        </div>
        <div class="form-group">
          <label>lng</label><br>
            <input class="form-control" id = "lng" type="text" name="lng" value="{{ $location->longitude }}" required />
        </div>
        <label>location</label><br>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?v=3.33&key={{ config('services.google-map.apikey') }}&libraries=places&callback=initMap" async></script>
         <script type="text/javascript">
         var lat = '{{$location->latitude}}';
         var lng = '{{$location->longitude}}';
         var map;
         var marker;
         function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
               center: { // 地図の中心を指定
                   lat: parseFloat(lat), // 緯度
                   lng: parseFloat(lng) // 経度
               },
               zoom: 15 // 地図のズーム
             });
             marker = new google.maps.Marker( {
	              map: map,
	               position: new google.maps.LatLng(lat, lng),
               });
             google.maps.event.addListener(map, 'click', dropMarker);

             //クリックしたらその座標にマーカーを置く
             function dropMarker(event){


               var opts = {
         	         animation: google.maps.Animation.DROP,
                  };

                       //marker作成
                       var marker = new google.maps.Marker(opts);
                         //markerの位置を設定
                       //event.latLng.lat()でクリックしたところの緯度を取得
                       marker.setPosition(new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()));
                       //marker設置
                       marker.setMap(map);
                       pos = marker.getPosition();
                       lat = pos.lat();
                       lng = pos.lng();
                       document.getElementById("lat").value = lat ;
                       document.getElementById("lng").value = lng ;
                };
             // クリックした地点の座標をalertで表示する
           }
         </script>
         <div id="map"></div><br>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>　
    </form>

</div>
@endsection
