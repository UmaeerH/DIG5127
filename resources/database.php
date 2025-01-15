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

    // Getter methods for accessing private properties
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
}
?>
