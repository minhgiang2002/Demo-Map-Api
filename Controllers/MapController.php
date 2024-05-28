<?php
class MapController {
    private $apiKey;
    private $apiKeyMap;

    public function __construct($apiKey, $apiKeyMap = null) {
        $this->apiKey = $apiKey;
        $this->apiKeyMap = $apiKeyMap;
    }

    public function displayMap() {
        // Truyền khóa API cho view
        $apiKey = $this->apiKey;
        $apiKeyMap = $this->apiKeyMap;

        // Tải view
        include 'Views/Map_view.php';
    }
}
?>
