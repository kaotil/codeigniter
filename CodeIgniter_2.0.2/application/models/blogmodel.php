<?php
class Blogmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

/*
    function get_last_ten_entries()
    {
        return array('aaa', 'bbb');
    }
*/
    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('entry', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // 下の Note を参照してください
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entry', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entry', $this, array('id' => $_POST['id']));
    }
}