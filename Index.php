<?php
// Yêu cầu tệp 'MapController.php'
require 'Controllers/MapController.php';

// Thay 'YOUR_GOONG_API_KEY' bằng khóa API Goong thực tế của bạn
$apiKey = 'TnDsapVukeHEMjNyiv4DZjynltl1KJI4izeH27FT'; // Key được sử dụng để gọi api geocode, autocomplete, routing, ...
$apiKeyMap = 'AXwf2nK5uEO4Lr0MNbjKdznKRYCOJe9hUsIPc9Ct'; //Key được sử dụng để hiện thị bản đồ.

// Tạo một đối tượng của lớp MapController với các khóa API đã cung cấp
$controller = new MapController($apiKey, $apiKeyMap);

// Hiển thị bản đồ bằng cách gọi phương thức displayMap() của đối tượng controller
$controller->displayMap();
?>
