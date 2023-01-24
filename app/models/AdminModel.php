<?php
class AdminModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }



  // Login Admin
  public function login($email, $password)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();
    if ($row['password'] == $password) {
      return $row;
    } else {
      return false;
    }
  }

  // Find admin by email
  public function findAdminByEmail($email)
  {
    $this->db->query('SELECT * FROM admin WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }
}
