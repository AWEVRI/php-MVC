<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($fname, $lname, $course, $contact) {
      $sql = 'INSERT INTO students (fname, lname, course, contact) VALUES (:fname, :lname, :course, :contact)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'lname' => $lname,
        'course' => $course,
        'contact' => $contact
      ]);
      return true;
    }

    // Fetch All students From Database
    public function read() {
      $sql = 'SELECT * FROM students ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM students WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $course, $contact) {
      $sql = 'UPDATE students SET fname = :fname, lname = :lname, course = :course, contact = :contact WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'lname' => $lname,
        'course' => $course,
        'contact' => $contact,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM students WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>