<?php
class Ovst_model extends CI_Model
{
    public function getData()
    {
        $sql = "
        SELECT
        o.*,
        o.vstdate,
        p.cid,
        o.hn,
        o.vsttime,
        o.vn,
        concat( p.pname, p.fname, ' ', p.lname ) AS ptname,
        v.age_y,
        v.age_m,
        v.age_d,
        k.depcode AS curdep_code,
        k.department AS curdep_name,
        ( SELECT ods.sign_datetime FROM ovst_doctor_sign ods WHERE vn = o.vn ORDER BY ods.sign_datetime DESC LIMIT 1 ) AS sign_datetime 
    FROM
        ovst o
        LEFT OUTER JOIN vn_stat v ON v.vn = o.vn
        LEFT OUTER JOIN patient p ON p.hn = o.hn
        LEFT OUTER JOIN kskdepartment k ON k.depcode = o.cur_dep 
    WHERE
        k.spclty = '01'
        AND o.vstdate >= CURDATE() 
    ORDER BY
        sign_datetime DESC 
        LIMIT 10
        ";
        $query = $this->db->query($sql);
        return $query;
    }
    public function findByOqueue($oqueue)
    {
        $sql = "
        SELECT
        o.*,
        o.vstdate,
        p.cid,
        o.hn,
        o.vsttime,
        o.vn,
        concat(p.fname, ' ', p.lname ) AS ptname,
        v.age_y,
        v.age_m,
        v.age_d,
        k.depcode AS curdep_code,
        k.department AS curdep_name,
        ( SELECT ods.sign_datetime FROM ovst_doctor_sign ods WHERE vn = o.vn ORDER BY ods.sign_datetime DESC LIMIT 1 ) AS sign_datetime 
    FROM
        ovst o
        LEFT OUTER JOIN vn_stat v ON v.vn = o.vn
        LEFT OUTER JOIN patient p ON p.hn = o.hn
        LEFT OUTER JOIN kskdepartment k ON k.depcode = o.cur_dep 
    WHERE
        o.vstdate >= CURDATE()
        AND o.oqueue = ".$oqueue."
        ";
        $query = $this->db->query($sql);
        return $query;
    }
}
