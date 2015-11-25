var ContactPage = function () {

	return {

		//Basic Map
		initMap: function () {
			var map;
			$(document).ready(function () {
				map = new GMaps({
					div: '#map',
					scrollwheel: false,
					lat: 37.983333,
					lng: 23.755962
				});

				var marker = map.addMarker({
					lat: 37.983333,
					lng: 23.755962,
					title: 'AHK'
				});
			});
		},

		//Panorama Map
		initPanorama: function () {
			var panorama;
			$(document).ready(function () {
				panorama = GMaps.createPanorama({
					el: '#panorama',
					lat: 37.983333,
					lng: 23.755962
				});
			});
		}

	};
}();