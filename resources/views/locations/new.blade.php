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
<div class="container">
<h1>location_new</h1>
<form action="/users/locations/" method="POST">
    @csrf
    {{ csrf_field() }}
    <div class="form-group">
        <label>Title</label><br>
        <input class="form-control" type="text" name="title" required />
    </div>
    <div class="form-group">
        <label>content</label><br>
        <textarea class="form-control" name="content" required ></textarea>
    </div>
    <div class="form-group">
      <label>lat</label><br>
        <input class="form-control" id = "lat" type="text" name="lat" required />
    </div>
    <div class="form-group">
      <label>lng</label><br>
        <input class="form-control" id = "lng" type="text" name="lng" required />
    </div>
<label>location</label><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.33&key={{ config('services.google-map.apikey') }}&libraries=places&callback=initMap" async></script>
<script type="text/javascript">
var map;
var lat = 35.677730;
var lng = 139.754813;
//現在位置を取得する
var geo_Options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 1000
};
function success(pos){
  var crd = pos.coords;
  lat = crd.latitude;
  lng = crd.longitude;
}
function error(){}

navigator.geolocation.getCurrentPosition(success, error, geo_Options);

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
      center: { // 地図の中心を指定
          lat: lat, // 緯度
          lng:  lng// 経度
      },
      zoom: 15 // 地図のズーム
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
              document.getElementById("lat").value = lat;
              document.getElementById("lng").value = lng;
       };
  }
</script>
<div id="map"></div><br>
<div>
    <input type= "submit" value="Create" class="btn btn-primary" />
</div>
</form>
</div>
@endsection
