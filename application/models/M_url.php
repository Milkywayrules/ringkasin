<?php

  /**
   *
   */
  class M_url extends CI_Model
  {

    var $table = 'url';

    function create_url($ori, $short, $custom, $qrcode, $createdBy){
      $createdAt = unix_to_human(now(), true, 'europe');
      return $this->db->query( "INSERT INTO url (ori_url, short_url, custom_url, qrcode, created_at, created_by)
        VALUES ('{$ori}', '{$short}', '{$custom}', '{$qrcode}', '{$createdAt}', '{$createdBy}')" );
    }

    function delete_url($is_active, $id){
      return $this->db->query( "UPDATE url SET is_active='{$is_active}', custom_url='' WHERE id={$id};" );
    }

    // ambil semua url dan data urlnya
    function get_all(){
      $this->db->order_by('id', 'DESC');
      $this->db->from($this->table);
      $this->db->where('is_active', '1');
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }
    // ambil url berdasarkan username yg input
    function get_all_by_username($username){
      $this->db->order_by('id', 'DESC');
      $this->db->from($this->table);
      $this->db->where('created_by', $username);
      $this->db->where('is_active', '1');
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }
    // ambil url custom berdasarkan username yg input
    function get_all_custom_by_username($username){
      $this->db->order_by('id', 'DESC');
      $this->db->from($this->table);
      $this->db->where('created_by', $username);
      $this->db->where('custom_url !=', '');
      $this->db->where('is_active', '1');
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }
    // ambil berdasarkan id
    function get_by_id($id){
      $this->db->from($this->table);
      $this->db->where('id', $id);
      $this->db->where('is_active', '1');
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }
    // ambil berdasarkan short url
    function get_by_short_url($code){
      $this->db->from($this->table);
      $this->db->where('short_url', $code);
      $this->db->where('is_active', '1');
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

    // ambil url berdasarkan short_url atau custom_url
    function get_url($shortUrl){
      return $this->db->QUERY( "SELECT * FROM url WHERE short_url='{$shortUrl}' OR custom_url='{$shortUrl}';" );
    }
    // ambil url berdasarkan ori_url
    function get_url_ori($oriUrl){
      return $this->db->QUERY( "SELECT * FROM url WHERE ori_url='{$oriUrl}';" );
    }
    // ambil id terbesar atau nomor terakhir data url
    function get_max_id(){
      return $this->db->query( 'SELECT MAX(id) AS Max_id FROM url')->row_object();
    }

    // ambil berdasarkan username yg input
    function get_by_add_by($username){
      $this->db->from($this->table);
      $this->db->where('username',$username);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }

    // ambil berdasarkan ori_url
    function get_by_ori_link($oriUrl){
      $this->db->from($this->table);
      $this->db->where('ori_url',$oriUrl);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }

    function get_hit($shortUrl){
      return $this->db->query( "SELECT id,hit FROM url WHERE short_url='{$shortUrl}' or custom_url='{$shortUrl}';" )->row_object();
    }
    function update_hit($shortUrl){
      $get_hit = $this->M_url->get_hit($shortUrl);
      $hit = $get_hit->hit;
      $hit++;
      return $this->db->query( "UPDATE url SET hit='{$hit}' WHERE id={$get_hit->id};" );
    }

    public function count_url()
    {
      return $this->db->query( "SELECT COUNT(id) AS Total_url FROM url;" );
    }

  }


 ?>
