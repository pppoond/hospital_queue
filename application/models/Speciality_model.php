<?php
class Speciality_model extends CI_Model
{
    public function getData()
    {
        $sql = "
        select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d,
        k.depcode as curdep_code,k.department as curdep_name from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn
        left outer join kskdepartment k on k.depcode = o.cur_dep
                where k.spclty = '11' AND
                 o.vstdate >= CURDATE() ORDER BY o.oqueue ASC LIMIT 10
        ";
        $query = $this->db->query($sql);
        return $query;
    }
    public function findById($id)
    {
    }
}
