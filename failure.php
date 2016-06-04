<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>The Annual Conference</title>

	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

	<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
	<link href="animate.min.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet" type="text/css" />

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script>
		function initialize() {
			var myLatlng = new google.maps.LatLng(12.894655,77.675153);
			var map_options = {
				zoom: 16,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: myLatlng,
				scrollwheel: false,
				disableDefaultUI: true
			}

			var map = new google.maps.Map(document.getElementById('map_canvas'), map_options)
			var myIcon = new google.maps.MarkerImage('images/map_icon.png', null, null, null, new google.maps.Size(36,54));

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				icon: myIcon
			});

			/* Remove if you dont want B/W Google Map */
			/*
			 var styles = [
			 {
			 featureType: "all",
			 stylers: [
			 { saturation: -100 }
			 ]
			 }
			 ];

			 map.setOptions({styles: styles});
			 */
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<!-- Google Map Ends! -->

</head>

<body>

<div class="registration" style="padding-top:10%">
	<div class="container">

		<h2>Conference Registration</h2>
		<p class="subtitle"><strong>Something went wrong :( </strong> Please try again!</p>

	</div>
	<!-- registration ends! -->

	<!-- footer -->
	<div class="footer" style=" bottom: 0px; position: fixed; width: 100%;">
		<div class="container" style="text-align: center">

			<p style="text-align: center">Copyright 2016 <a href="http://www.amrita.edu">Amrita Center for Cybersecurity Systems and Networks</a></p>

		</div>
	</div>
	<!-- footer ends! -->


	<!-- scripts -->
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/jquery-ui-1.11.2/jquery-ui.min.js"></script>
	<script src="scripts/flexslider/jquery.flexslider-min.js"></script>
	<script src="scripts/jquery.parallax-1.1.3.js"></script>
	<script src="scripts/jquery.inview.min.js"></script>
	<script src="scripts/form.js"></script>
	<script src="scripts/theme.js"></script>
	<!-- scripts ends! -->
</body>
</html>
