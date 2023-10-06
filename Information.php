<?php
class Information {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertFriend($name, $phone, $email, $country, $city) {
        $stmt = $this->conn->prepare("INSERT INTO friends_information (name, phone, email, country, city) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $phone, $email, $country, $city);

        if ($this->isPhoneUnique($phone)) {
            if ($stmt->execute()) {
                $_SESSION['message'] = "Data inserted successfully!";
                header("Location: informationList.php");
                exit();
            } else {
                $_SESSION['message'] = "Error inserting data: " . $stmt->error;
            }
        } else {
            $_SESSION['message'] = "Phone number already exists!";
        }
    }

    private function isPhoneUnique($phone) {
        $stmt = $this->conn->prepare("SELECT phone FROM friends_information WHERE phone = ?");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows == 0; 
    }
    public function fetchAllData() {
        $sql = "SELECT * FROM friends_information";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array(); 
        }
}

public function searchData($query) {
    $sql = "SELECT * FROM friends_information WHERE name LIKE '%$query%' OR phone LIKE '%$query%'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return array();
    }
}

}
?>
