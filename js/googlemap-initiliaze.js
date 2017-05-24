
			jQuery(document).on('ready', function () {
				
				"use strict";
			/*================== Map =====================*/	
			function initialize() {
			  var myLatlng = new google.maps.LatLng(-34.892525, -56.159964);
			  var mapOptions = {
				zoom: 15,
				disableDefaultUI: true,
				scrollwheel:false,
				center: myLatlng
			  };
			  var map = new google.maps.Map(document.getElementById('canvas'), mapOptions);
	
			  var image = 'images/icon-map.png';

			  var myLatLng = new google.maps.LatLng(-34.892525, -56.159964);
			  var beachMarker = new google.maps.Marker({
				  position: myLatLng,
				  map: map,
				  icon: image
			});
	
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			
				});
