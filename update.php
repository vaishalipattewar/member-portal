<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#map{ 
width:700px; 
height: 500px;
float: left; 
}
#div3
{
border:1px solid #FFFFFF;
 width:300px;
height:500px;

padding:50px;
float: right;
background:#FFFFFF;
margin-left:0px;
margin-right:0px;
margin-top:0px;
margin-bottom:0px;
}
        </style>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="dashboard"><span id="tab"><a href="dashboard.php">Dashboard</a></span></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>

<h1>Select a location!</h1>
        <p>Click on a location on the map to select it. Drag the marker to change location.</p>
        
        <!--map div-->
        <div id="map"></div>
        
        <script>

var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
 
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(52.357971, -6.516758);
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 7 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
}     
        
//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-2Xn54sxl3u_j_TCI_Khj8ZY7ylayHNs&callback=initMap"
    async defer></script>
<div id="div3">
<form action="/memberportal/updatedata.php" method="post">
<table align="center" cellspacing="10" columnspan="2">
    <tr><td>Name<span style="color:#FB0933">*</span>: </td>
    <td><input type="text" name="name" id="name" size="20" pattern="[A-Za-z\.\s]{2,}" maxlength="100" placeholder="Enter Name" title="Name should contain alphabets" required/></td></tr>
    <tr><td>E-mail<span style="color:#FB0933">*</span>:</td> 
    <td><input type="email" name="email" id="email" size="20" maxlength="100" placeholder="Enter Email" required/></td></tr>
    <tr><td>Contact No<span style="color:#FB0933">*</span>:</td> 
    <td><input type="number" name="contactNo" id="mobileNo" size="20" maxlength="10" minlength="10" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" placeholder="Enter Mobile number" required></td></tr>
    <tr><td>Profession<span style="color:#FB0933">*</span>:</td> 
    <td><input type="text" name="profession" id="profession" size="20" pattern="[A-Za-z\.\s]{2,}" placeholder="Enter profession" title="Please Enter proper profession" required/></td></tr>
    <tr><td>Location<span style="color:#FB0933">*</span>:</td> 
    <td><input type="text" name="location" id="address" size="20"></td></tr>
    <tr><td><center><input type="submit" name="submit" value="Update"></center></td></tr>
</table>
</form>
</div>

<input type="text" id="lat" readonly="yes"><br>
 <input type="text" id="lng" readonly="yes"><br>
        
</body>
</html>