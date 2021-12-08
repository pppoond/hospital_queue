<?php
class HomeModel extends CI_Model
{
    public function getData()
    {
        $sql = "SELECT * FROM queue_table";
        $query =  $this->db->select($sql);
        $results = $query->getResultArray();

        foreach ($results as $row) {
            echo $row['title'];
            echo $row['name'];
            echo $row['email'];
        }
        echo "GetData";
    }
}
