<?php
class Opd_model extends CI_Model
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

    public function getDataByQueue()
    {

        //order by cur_dep_time
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
	(SELECT ods.sign_datetime FROM ovst_doctor_sign ods WHERE vn = o.vn ORDER BY ods.sign_datetime DESC LIMIT 1) as sign_datetime
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

    public function add()
    {
        return "HEO";
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }

    public function findById($id)
    {
    }
}
