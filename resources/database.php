<?php

include 'app_config.php';


// BUILDING / ROOM
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

// EQUIPMENT + SOFTWARE
class Equipment {
    private $equipmentID;
    private $model;
    private $designatedRoom;
    private $status;

    public function __construct($equipmentID, $model, $designatedRoom, $status) {
        $this->equipmentID = $equipmentID;
        $this->model = $model;
        $this->designatedRoom = $designatedRoom;
        $this->status = $status;
    }
    // Getters
    public function getEquipmentID() { return $this->equipmentID; }
    public function getModel() { return $this->model; }
    public function getDesignatedRoom() { return $this->designatedRoom; }
    public function getStatus() { return $this->status; }
    // Setters
    public function setEquipmentID($equipmentID) { $this->equipmentID = $equipmentID; }
    public function setModel($model) { $this->model = $model; }
    public function setDesignatedRoom($designatedRoom) { $this->designatedRoom = $designatedRoom; }
    public function setStatus($status) { $this->status = $status; }
}

class Computer extends Equipment {
    private $computerID;
    private $dGPU;
    private $VMcapable;
    private $operatingSystem;

    public function __construct($equipmentID, $model, $designatedRoom, $status, $computerID, $dGPU, $VMcapable, $operatingSystem) {
        parent::__construct($equipmentID, $model, $designatedRoom, $status);
        $this->computerID = $computerID;
        $this->dGPU = $dGPU;
        $this->VMcapable = $VMcapable;
        $this->operatingSystem = $operatingSystem;
    }

    // Getters
    public function getComputerID() { return $this->computerID; }
    public function getDGPU() { return $this->dGPU; }
    public function getVMcapable() { return $this->VMcapable; }
    public function getOperatingSystem() { return $this->operatingSystem; }
    
    // Setters
    public function setComputerID($computerID) { $this->computerID = $computerID; }
    public function setDGPU($dGPU) { $this->dGPU = $dGPU; }
    public function setVMcapable($VMcapable) { $this->VMcapable = $VMcapable; }
    public function setOperatingSystem($operatingSystem) { $this->operatingSystem = $operatingSystem; }
}

class Software {
    private $softwareID;
    private $name;
    private $vendor;
    private $licenceType;
    private $licenceExpire;

    public function __construct($softwareID, $name, $vendor, $licenceType, $licenceExpire) {
        $this->softwareID = $softwareID;
        $this->name = $name;
        $this->vendor = $vendor;
        $this->licenceType = $licenceType;
        $this->licenceExpire = $licenceExpire;
    }

    // Getters
    public function getSoftwareID() { return $this->softwareID; }
    public function getName() { return $this->name; }
    public function getVendor() { return $this->vendor; }
    public function getLicenceType() { return $this->licenceType; }
    public function getLicenceExpire() { return $this->licenceExpire; }
    
    // Setters
    public function setSoftwareID($softwareID) { $this->softwareID = $softwareID; }
    public function setName($name) { $this->name = $name; }
    public function setVendor($vendor) { $this->vendor = $vendor; }
    public function setLicenceType($licenceType) { $this->licenceType = $licenceType; }
    public function setLicenceExpire($licenceExpire) { $this->licenceExpire = $licenceExpire; }
}




// USERS
class User {
    private $userID;
    private $username;
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $userType;
    private $createdAt;

    public function __construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt) {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userType = $userType;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getUserID() { return $this->userID; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }
    public function getFirstName() { return $this->firstName; }
    public function getLastName() { return $this->lastName; }
    public function getUserType() { return $this->userType; }
    public function getCreatedAt() { return $this->createdAt; }
    
    // Setters
    public function setUserID($userID) { $this->userID = $userID; }
    public function setUsername($username) { $this->username = $username; }
    public function setPassword($password) { $this->password = $password; }
    public function setEmail($email) { $this->email = $email; }
    public function setFirstName($firstName) { $this->firstName = $firstName; }
    public function setLastName($lastName) { $this->lastName = $lastName; }
    public function setUserType($userType) { $this->userType = $userType; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }
}

class UniversityUser extends User {
    private $universityName;
    private $faculty;

    public function __construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $universityName, $faculty) {
        parent::__construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt);
        $this->universityName = $universityName;
        $this->faculty = $faculty;
    }

    public function getUniversityName() { return $this->universityName; }
    public function setUniversityName($universityName) { $this->universityName = $universityName; }
    public function getFaculty() { return $this->faculty; }
    public function setFaculty($faculty) { $this->faculty = $faculty; }
}

class UniversityStaff extends UniversityUser {
    private $department;

    public function __construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $universityName, $faculty, $department) {
        parent::__construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $universityName, $faculty);
        $this->department = $department;
    }

    public function getDepartment() { return $this->department; }
    public function setDepartment($department) { $this->department = $department; }
}

class UniversityStudent extends UniversityUser {
    private $studentID;
    private $course;

    public function __construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $universityName, $faculty, $studentID, $course) {
        parent::__construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $universityName, $faculty);
        $this->studentID = $studentID;
        $this->course = $course;
    }

    public function getStudentID() { return $this->studentID; }
    public function setStudentID($studentID) { $this->studentID = $studentID; }
    public function getCourse() { return $this->course; }
    public function setCourse($course) { $this->course = $course; }
}

class ExternalUser extends User {
    private $externalType;
    private $paymentType;
    private $paymentToken;
    private $paymentIndentifier;
    private $paymentDate;
    private $company;
    private $role;

    public function __construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt, $externalType, $paymentType, $paymentToken, $paymentIndentifier, $paymentDate, $company, $role) {
        parent::__construct($userID, $username, $password, $email, $firstName, $lastName, $userType, $createdAt);
        $this->externalType = $externalType;
        $this->paymentType = $paymentType;
        $this->paymentToken = $paymentToken;
        $this->paymentIndentifier = $paymentIndentifier;
        $this->paymentDate = $paymentDate;
        $this->company = $company;
        $this->role = $role;
    }

    // Getters
    public function getExternalType() { return $this->externalType; }
    public function getPaymentType() { return $this->paymentType; }
    public function getPaymentToken() { return $this->paymentToken; }
    public function getPaymentIndentifier() { return $this->paymentIndentifier; }
    public function getPaymentDate() { return $this->paymentDate; }
    public function getCompany() { return $this->company; }
    public function getRole() { return $this->role; }

    // Setters
    public function setExternalType($externalType) { $this->externalType = $externalType; }
    public function setPaymentType($paymentType) { $this->paymentType = $paymentType; }
    public function setPaymentToken($paymentToken) { $this->paymentToken = $paymentToken; }
    public function setPaymentIndentifier($paymentIndentifier) { $this->paymentIndentifier = $paymentIndentifier; }
    public function setPaymentDate($paymentDate) { $this->paymentDate = $paymentDate; }
    public function setCompany($company) { $this->company = $company; }
    public function setRole($role) { $this->role = $role; }
}


// FUNCTIONS

function formatTimeSlot($timeSlot) {
    $startTime = DateTime::createFromFormat('H:i:s', $timeSlot);    // Take in XX:00:00
    $endTime = clone $startTime;
    $endTime->add(new DateInterval('PT1H')); // Add 1 hour to the start time
    return $startTime->format('H:i') . ' - ' . $endTime->format('H:i'); // Format as "X : 00 - X+1 : 00"   ex; 13:00 - 14:00
}
?>