<?php
    class query{
        private $id;
        private $id_location;
        private $label;
        private $description;
        private $lat;
        private $lng;
        private $media;

        function setId($id) { $this->id = $id; }
        function getId() { return $this->id; }
        function setId_location($id_location) { $this->id_location = $id_location; }
        function getId_location() { return $this->id_location; }
        function setLabel($label) { $this->label = $label; }
        function getLabel() { return $this->label; }
        function setDescription($description) { $this->description = $description; }
        function getDescription() { return $this->description; }
        function setLat($lat) { $this->lat = $lat; }
        function getLat() { return $this->lat; }
        function setLng($lng) { $this->lng = $lng; }
        function getLng() { return $this->lng; }
        function setMedia($media) { $this->media = $media; }
        function getMedia() { return $this->media; }

        public function __construct()
        {
            require_once("config.php");
            $conn = new dbconnect;
            $this->conn = $conn->connect();
        }

        public function getAllLocations() {
            $sql = "SELECT markers.*,users.name FROM markers LEFT JOIN users ON markers.id=users.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getRoadDataName() {
            $userid = $_SESSION['id'];
            $sql = "SELECT label FROM markers WHERE markers.id=$userid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>