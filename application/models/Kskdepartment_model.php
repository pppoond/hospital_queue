<?php
class Kskdepartment_model extends CI_Model
{
    protected $tableName = "kskdepartment";
    public function getData()
    {
        $sql = "
        SELECT * FROM {$this->tableName} ORDER BY depcode ASC;
        ";
        $query = $this->db->query($sql);
        return $query;
    }
    public function findById($depcode)
    {
        $sql = "
        SELECT * FROM {$this->tableName} WHERE spclty = " . $depcode . " ORDER BY depcode ASC;
        ";
        $query = $this->db->query($sql);
        return $query;
    }
}
