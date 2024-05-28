<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> DEMO MAP API </title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css" rel="stylesheet" />
<link href="Css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Load the `goong-geocoder` plugin. -->
<script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-geocoder@1.1.1/dist/goong-geocoder.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-geocoder@1.1.1/dist/goong-geocoder.css" rel="stylesheet" type="text/css" />
<!-- Promise polyfill script is required to use Goong Geocoder in IE 11. -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

<input id="searchInput" type="text" placeholder="Nhập địa chỉ">
<div id="suggestionList"></div>
<div id="map"></div>
<div id="result"></div>
<div id="currentLocation">Tìm vị trí của bạn</div>

<script>
    goongjs.accessToken = '<?php echo $apiKeyMap; ?>';

    var map = new goongjs.Map({
        container: 'map',
        style: 'https://tiles.goong.io/assets/goong_map_web.json',
        center: [105.84478, 21.02897],
        zoom: 13
        
    });

    var geocoder = new GoongGeocoder({
        accessToken: '<?php echo $apiKey; ?>',
        goongjs: goongjs
    });

  
    // Thêm điều khiển zoom và xoay bản đồ.
    map.addControl(new goongjs.NavigationControl());
    var marker = new goongjs.Marker();

    function addMarker(lngLat, description) {
        marker.setLngLat(lngLat).addTo(map);
        map.setCenter(lngLat);
        map.setZoom(15);
    }
    
    document.getElementById('searchInput').addEventListener('input', function () {
        var inputText = this.value;

        if (inputText.length > 2) {
            fetch(`https://rsapi.goong.io/Place/Autocomplete?input=${encodeURIComponent(inputText)}&api_key=<?php echo $apiKey; ?>`)
                .then(response => response.json())
                .then(data => {
                    var suggestions = data.predictions;
                    var suggestionList = document.getElementById('suggestionList');
                    suggestionList.innerHTML = '';
                    suggestionList.style.display = 'block';

                    suggestions.forEach(suggestion => {
                        var suggestionDiv = document.createElement('div');
                        suggestionDiv.textContent = suggestion.description;
                        suggestionDiv.addEventListener('click', function () {
                            document.getElementById('searchInput').value = suggestion.description;
                            suggestionList.style.display = 'none';
                            fetch(`https://rsapi.goong.io/Place/Detail?placeid=${suggestion.place_id}&api_key=<?php echo $apiKey; ?>`)
                                .then(response => response.json())
                                .then(detailData => {
                                    var location = detailData.result.geometry.location;
                                    document.getElementById('result').textContent = `Latitude: ${location.lat}, Longitude: ${location.lng}`;
                                    addMarker([location.lng, location.lat], suggestion.description);
                                })
                                .catch(error => console.error('Error:', error));
                        });
                        suggestionList.appendChild(suggestionDiv);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });


    document.getElementById('currentLocation').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lng = position.coords.longitude;
                var lat = position.coords.latitude;
                addMarker([lng, lat]);
                document.getElementById('result').textContent = `Latitude: ${lat}, Longitude: ${lng}`;
            }, function(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert('Người dùng từ chối yêu cầu xác định vị trí.');
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert('Thông tin vị trí không khả dụng.');
                        break;
                    case error.TIMEOUT:
                        alert('Yêu cầu xác định vị trí vượt quá thời gian.');
                        break;
                    case error.UNKNOWN_ERROR:
                        alert('Đã xảy ra lỗi không xác định.');
                        break;
                }
            }, {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            });
        } else {
            alert('Trình duyệt của bạn không hỗ trợ Geolocation.');
        }
    });

    document.addEventListener('click', function(event) {
        var suggestionList = document.getElementById('suggestionList');
        if (!suggestionList.contains(event.target) && event.target.id !== 'searchInput') {
            suggestionList.style.display = 'none';
        }
    });
</script>
</body>
</html>