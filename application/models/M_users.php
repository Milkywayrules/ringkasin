<?php

  /**
   *
   */
  class M_users extends CI_Model
  {

    var $table = 'user';

    // daftar user baru
    public function create($name, $username, $email, $phone, $gender, $password, $privilege, $activation_code){
      // insert data register ke db
      $create_at = unix_to_human(now(), true, 'europe');
      return $this->db->query("INSERT INTO user (name, username, email, phone, gender, password, privilege, activation_code, create_at)
                              VALUES ('{$name}', '{$username}', '{$email}', '{$phone}', '{$gender}', '{$password}', '{$privilege}', '{$activation_code}', '{$create_at}');");
    }

    // ganti info pada settings
    function set_info($email, $name, $phone, $username){
      return $this->db->query( "UPDATE user SET email='{$email}', name='{$name}', phone='{$phone}' WHERE username='{$username}';" );
    }

    function set_reset_code($email, $code){
      return $this->db->query( "UPDATE user SET reset_code='{$code}' WHERE email='{$email}';" );
    }

    // ambil semua user dan data usernya
    public function get_all(){
      $this->db->order_by('id', 'ASC');
      $this->db->from($this->table);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }

    // ambil reset code untuk reset password
    public function get_reset_code($code){
      $this->db->from($this->table);
      $this->db->where('reset_code',$code);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

    // ambil user berdasarkan email / username
    public function get_user($emailUsername){
      $this->db->from($this->table);
      $this->db->where('email',$emailUsername);
      $this->db->or_where('username',$emailUsername);
      $this->db->where('privilege >=', 5);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

    // ambil admin berdasarkan username
    public function get_admin_by_username($username){
      $this->db->from($this->table);
      $this->db->where('username',$username);
      $this->db->where('privilege <=', 4);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

  }


 ?>
