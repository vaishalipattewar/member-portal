<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="dashboard"><span id="tab"><a href="dashboard.php">Dashboard</a></span></b>
<b id="logout"><a href="logout.php">Log Out</a></b>

</div>
<?php
include_once("connect.php");

$sql = "select location from registration where username='$login_session'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$address=$row["location"];
echo $address;

  $Address = urlencode($address);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
      $LatLng = "$Lat,$Lon";
      }
  
  
?>
<div id="map"></div>
    <script>
      var map;
       var Lat = "<?php echo $Lat; ?>";
	 var Lon = "<?php echo $Lon; ?>";
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 20.5937, lng: 78.9629},
          zoom: 8
        });
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(Lat, Lon),
          map: map
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-2Xn54sxl3u_j_TCI_Khj8ZY7ylayHNs&callback=initMap"
    async defer></script>
</body>
</html>