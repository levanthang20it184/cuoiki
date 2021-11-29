@extends('layout.master')
@section('title')
<title>Home page</title>
<style type="text/css">
	.container{
    margin: 10px auto 10px;
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin: 20px 0px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.box.box-primary {
    border-top-color: #3c8dbc;
}

.box.box-info {
    border-top-color: #00c0ef;
}
.box.box-danger {
    border-top-color: #dd4b39;
}
.box.box-warning {
    border-top-color: #f39c12;
}
.box.box-success {
    border-top-color: #00a65a;
}
.box.box-default {
    border-top-color: #d2d6de;
}

.box.collapsed-box .box-body,
.box.collapsed-box .box-footer {
    display: none;
}
.box .nav-stacked > li {
    border-bottom: 1px solid #f4f4f4;
    margin: 0;
}
.box .nav-stacked > li:last-of-type {
    border-bottom: none;
}
.box.height-control .box-body {
    max-height: 300px;
    overflow: auto;
}
.box .border-right {
    border-right: 1px solid #f4f4f4;
}
.box .border-left {
    border-left: 1px solid #f4f4f4;
}
.box.box-solid {
    border-top: 0;
}
.box.box-solid > .box-header .btn.btn-default {
    background: transparent;
}
.box.box-solid > .box-header .btn:hover,
.box.box-solid > .box-header a:hover {
    background: rgba(0, 0, 0, 0.1);
}
.box.box-solid.box-default {
    border: 1px solid #d2d6de;
}
.box.box-solid.box-default > .box-header {
    color: #444444;
    background: #d2d6de;
    background-color: #d2d6de;
}
.box.box-solid.box-default > .box-header a,
.box.box-solid.box-default > .box-header .btn {
    color: #444444;
}
.box.box-solid.box-primary {
    border: 1px solid #3c8dbc;
}
.box.box-solid.box-primary > .box-header {
    color: #ffffff;
    background: #3c8dbc;
    background-color: #3c8dbc;
}
.box.box-solid.box-primary > .box-header a,
.box.box-solid.box-primary > .box-header .btn {
    color: #ffffff;
}
.box.box-solid.box-info {
    border: 1px solid #00c0ef;
}
.box.box-solid.box-info > .box-header {
    color: #ffffff;
    background: #00c0ef;
    background-color: #00c0ef;
}
.box.box-solid.box-info > .box-header a,
.box.box-solid.box-info > .box-header .btn {
    color: #ffffff;
}
.box.box-solid.box-danger {
    border: 1px solid #dd4b39;
}
.box.box-solid.box-danger > .box-header {
    color: #ffffff;
    background: #dd4b39;
    background-color: #dd4b39;
}
.box.box-solid.box-danger > .box-header a,
.box.box-solid.box-danger > .box-header .btn {
    color: #ffffff;
}
.box.box-solid.box-warning {
    border: 1px solid #f39c12;
}
.box.box-solid.box-warning > .box-header {
    color: #ffffff;
    background: #f39c12;
    background-color: #f39c12;
}
.box.box-solid.box-warning > .box-header a,
.box.box-solid.box-warning > .box-header .btn {
    color: #ffffff;
}
.box.box-solid.box-success {
    border: 1px solid #00a65a;
}
.box.box-solid.box-success > .box-header {
    color: #ffffff;
    background: #00a65a;
    background-color: #00a65a;
}
.box.box-solid.box-success > .box-header a,
.box.box-solid.box-success > .box-header .btn {
    color: #ffffff;
}
.box.box-solid > .box-header > .box-tools .btn {
    border: 0;
    box-shadow: none;
}
.box.box-solid[class*='bg'] > .box-header {
    color: #fff;
}
.box .box-group > .box {
    margin-bottom: 5px;
}
.box .knob-label {
    text-align: center;
    color: #333;
    font-weight: 100;
    font-size: 12px;
    margin-bottom: 0.3em;
}
.box > .overlay,
.overlay-wrapper > .overlay,
.box > .loading-img,
.overlay-wrapper > .loading-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.box .overlay,
.overlay-wrapper .overlay {
    z-index: 50;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 3px;
}
.box .overlay > .fa,
.overlay-wrapper .overlay > .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}
.box .overlay.dark,
.overlay-wrapper .overlay.dark {
    background: rgba(0, 0, 0, 0.5);
}
.box-header:before,
.box-body:before,
.box-footer:before,
.box-header:after,
.box-body:after,
.box-footer:after {
    content: " ";
    display: table;
}
.box-header:after,
.box-body:after,
.box-footer:after {
    clear: both;
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}
.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}
.collapsed-box .box-header.with-border {
    border-bottom: none;
}
.box-header > .fa,
.box-header > .glyphicon,
.box-header > .ion,
.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}
.box-header > .fa,
.box-header > .glyphicon,
.box-header > .ion {
    margin-right: 5px;
}
.box-header > .box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
}
.box-header > .box-tools [data-toggle="tooltip"] {
    position: relative;
}
.box-header > .box-tools.pull-right .dropdown-menu {
    right: 0;
    left: auto;
}
.box-header > .box-tools .dropdown-menu > li > a {
    color: #444!important;
}
.btn-box-tool {
    padding: 5px;
    font-size: 12px;
    background: transparent;
    color: #97a0b3;
}
.open .btn-box-tool,
.btn-box-tool:hover {
    color: #606c84;
}
.btn-box-tool.btn:active {
    box-shadow: none;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.no-header .box-body {
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.box-body > .table {
    margin-bottom: 0;
}
.box-body .fc {
    margin-top: 5px;
}
.box-body .full-width-chart {
    margin: -19px;
}
.box-body.no-padding .full-width-chart {
    margin: -9px;
}
.box-body .box-pane {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 3px;
}
.box-body .box-pane-right {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 0;
}
.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #ffffff;
}

/*
 * Component: Table
 * ----------------
 */
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  border-top: 1px solid #f4f4f4;
}
.table > thead > tr > th {
  border-bottom: 2px solid #f4f4f4;
}
.table tr td .progress {
  margin-top: 5px;
}
.table-bordered {
  border: 1px solid #f4f4f4;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #f4f4f4;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table.no-border,
.table.no-border td,
.table.no-border th {
  border: 0;
}
/* .text-center in tables */
table.text-center,
table.text-center td,
table.text-center th {
  text-align: center;
}
.table.align th {
  text-align: left;
}
.table.align td {
  text-align: right;
}
.mau{
    background: #FFF28C;
    margin-bottom:50px;
    padding: 100px;
    color: rgb(247, 35, 56);
</style>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection
@section('content')
    
	<div class="container">
            <?php
                function sendJsontoServer() {
    // $userIP = getUserIP();
    $userIP="2001:ee0:4baa:5f10:55de:294:f2de:220";
    $access_key = "?access_key=b441c8730ea0df84b0d9c7c6b3af18b2";
    $array_json = "http://api.ipstack.com/" . $userIP . $access_key;
    $array_json = "http://api.ipstack.com/" . $userIP . $access_key;

    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
    
}

function getCurrentData($region, $coutry_name, $access_key) {
    $location = $region . "," . $coutry_name . "&units=metric";
    $array_json = "http://api.openweathermap.org/data/2.5/weather?q=" . $location . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
}

function getForcast($city_id, $access_key) {
    $array_json = "http://api.openweathermap.org/data/2.5/forecast?id=" . $city_id . "&units=metric" . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
}


                $access_key = "&appid=ba472fa9dccfc59ee8edc5f6b9c40013";
                $ip_obj = sendJsontoServer();
                $country = $ip_obj->country_name;
                $region = $ip_obj->region_name;
                if(!$region){
                    $region = $ip_obj->location->capital;
                }
                $current_obj = getCurrentData($region, $country, $access_key);
                $city_id = $current_obj->id;
                $forcast_obj = getForcast($city_id, $access_key);
            ?>
            <div class="col-md-12 mau">
                <div class="row">
                    <div class="col-md-5">Location: <?php echo $region.", ".$country ?></div>
                    <div class="col-md-5">Update Time: <?php echo date("d/m/Y H:i:s",$current_obj->dt); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <div style="height:50px; width:50px; margin-left:auto;margin-right:auto;
                             background: url('http://openweathermap.org/img/w/<?php echo $current_obj->weather[0]->icon ?>.png');background-size: cover;"></div>
                        <div><?php echo $current_obj->main->temp." &#8451;" ?> - <?php echo  $current_obj->weather[0]->main ?></div>
                        <div>Cloudiness: <?php echo $current_obj->clouds->all."%" ?></div>
                    </div>
                    <div class="col-md-5">
                        <div>Pressure: <?php echo $current_obj->main->pressure."hPa" ?></div>
                        <div>Humidity: <?php echo $current_obj->main->humidity."%" ?></div>
                        <div>Min Temp: <?php echo $current_obj->main->temp_min." &#8451;" ?></div>
                        <div>Max Temp: <?php echo $current_obj->main->temp_max." &#8451;" ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">Wind Speed: <?php echo $current_obj->wind->speed." meter/sec" ?></div>
                    <div class="col-md-5">Wind Direction: <?php echo $current_obj->wind->deg."&deg;" ?></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Sunrise: <?php echo date("H:i:s",$current_obj->sys->sunrise); ?></div>
                    <div class="col-md-5">Sunset: <?php echo date("H:i:s",$current_obj->sys->sunset); ?></div>
                </div>
            </div>

            <div class="row">
                    <?php 
                        $forcast_list = $forcast_obj->list;
                        foreach($forcast_list as $temp){ 
                            ?>
                <div class="col-md-2 text-center" style="border: 1px solid;">
                    <div class="col-md-12"><b><?php echo date("d/m H:i",$temp->dt) ?></b></div>
                             <div class="col-md-12" style="height:50px; width:50px; margin-left:auto;margin-right:auto;
                             background: url('http://openweathermap.org/img/w/<?php echo $temp->weather[0]->icon ?>.png') no-repeat;"></div>
                             <div class="col-md-12"><?php echo $temp->main->temp." &#8451;" ?></div>
                             <div class="col-md-12"><?php echo $temp->main->humidity."%" ?></div>
                             <div class="col-md-12"><?php echo $temp->weather[0]->main ?></div>
                        </div>
                            <?php }
                    ?>
                </div>
        </div>
	
@endsection