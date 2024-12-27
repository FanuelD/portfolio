<?php

require_once 'db.php';

class Contact extends DB {
  public function insert($name, $email, $subject, $message) {
    $this->connect();

    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    if ($stmt->execute()) {
        $stmt->close();
        $this->closeConnection();
        return "Success";
    } else {
        $error = "Error" . $stmt->error;
        $stmt->close();
        $this->closeConnection();
        return $error;
    }  
  } 
}

?>