<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "openbook";

try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (mysqli_sql_exception $e) {
    die("Could not connect! Error: " . $e->getMessage());
} catch (Exception $e) {
    die($e->getMessage());
}

try {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect! Error: " . $e->getMessage());
}

try {
    $stmt = $pdo->prepare("SELECT * FROM buildings");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Process the results as needed
} catch (PDOException $e) {
    die("Query failed! Error: " . $e->getMessage());
}



class Building {
    private $buildingID;
    private $buildingName;
    private $buildingDesc;
    private $buildingImg;
    private $numbOfRooms;
    private $levels;
    private $helpline;
    private $streetName;
    private $city;
    private $postCode;

    public function __construct($buildingID, $buildingName, $buildingDesc, $buildingImg, $numbOfRooms, $levels, $helpline, $streetName, $city, $postCode) {
        $this->buildingID = $buildingID;
        $this->buildingName = $buildingName;
        $this->buildingDesc = $buildingDesc;
        $this->buildingImg = $buildingImg;
        $this->numbOfRooms = $numbOfRooms;
        $this->levels = $levels;
        $this->helpline = $helpline;
        $this->streetName = $streetName;
        $this->city = $city;
        $this->postCode = $postCode;
    }

    // Getters
    public function getBuildingID() { return $this->buildingID; }
    public function getBuildingName() { return $this->buildingName; }
    public function getBuildingDesc() { return $this->buildingDesc; }
    public function getBuildingImg() { return $this->buildingImg; }
    public function getNumbOfRooms() { return $this->numbOfRooms; }
    public function getLevels() { return $this->levels; }
    public function getHelpline() { return $this->helpline; }
    public function getStreetName() { return $this->streetName; }
    public function getCity() { return $this->city; }
    public function getPostCode() { return $this->postCode; }
    
    // Setters
    public function setBuildingID($buildingID) { $this->buildingID = $buildingID; }
    public function setBuildingName($buildingName) { $this->buildingName = $buildingName; }
    public function setBuildingDesc($buildingDesc) { $this->buildingDesc = $buildingDesc; }
    public function setBuildingImg($buildingImg) { $this->buildingImg = $buildingImg; }
    public function setNumbOfRooms($numbOfRooms) { $this->numbOfRooms = $numbOfRooms; }
    public function setLevels($levels) { $this->levels = $levels; }
    public function setHelpline($helpline) { $this->helpline = $helpline; }
    public function setStreetName($streetName) { $this->streetName = $streetName; }
    public function setCity($city) { $this->city = $city; }
    public function setPostCode($postCode) { $this->postCode = $postCode; }
}

class Room {
    private $roomID;
    private $building;
    private $roomName;
    private $roomDesc;
    private $roomImg;
    private $floor;
    private $capacity;
    private $roomType;

    public function __construct($roomID, $building, $roomName, $roomDesc, $roomImg, $floor, $capacity, $roomType) {
        $this->roomID = $roomID;
        $this->building = $building;
        $this->roomName = $roomName;
        $this->roomDesc = $roomDesc;
        $this->roomImg = $roomImg;
        $this->floor = $floor;
        $this->capacity = $capacity;
        $this->roomType = $roomType;
    }

    // Getters
    public function getRoomID() { return $this->roomID; }
    public function getBuilding() { return $this->building; }
    public function getRoomName() { return $this->roomName; }
    public function getRoomDesc() { return $this->roomDesc; }
    public function getRoomImg() { return $this->roomImg; }
    public function getFloor() { return $this->floor; }
    public function getCapacity() { return $this->capacity; }
    public function getRoomType() { return $this->roomType; }
    
    // Setters
    public function setRoomID($roomID) { $this->roomID = $roomID; }
    public function setBuilding($building) { $this->building = $building; }
    public function setRoomName($roomName) { $this->roomName = $roomName; }
    public function setRoomDesc($roomDesc) { $this->roomDesc = $roomDesc; }
    public function setRoomImg($roomImg) { $this->roomImg = $roomImg; }
    public function setFloor($floor) { $this->floor = $floor; }
    public function setCapacity($capacity) { $this->capacity = $capacity; }
    public function setRoomType($roomType) { $this->roomType = $roomType; }
}

?>
