<?php
class Speciality_model extends CI_Model
{
    public function getData()
    {
        $sql = "
        SELECT * FROM spclty ORDER BY spclty ASC;
        ";
        $query = $this->db->query($sql);
        return $query;
    }
    public function findById($id)
    {
    }
}
