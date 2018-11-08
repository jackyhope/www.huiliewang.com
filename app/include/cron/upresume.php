<?php
/*
* 
*
* 
*
* 
*
* 
 */
global $db_config,$db;


$query = $db->query("SELECT r1.id FROM $db_config[def]resume_expect AS r1 JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM $db_config[def]resume_expect)) AS id) AS r2 WHERE r1.id >= r2.id  AND status<>'2' AND `r_status`<>'2' AND `job_classid`<>'' AND `open`='1' AND `defaults`='1' AND exp>0 AND edu>0  ORDER BY r1.id ASC LIMIT 30");

while($rs = $db->fetch_array($query))
{
	
	$LastTime = strtotime('-'.rand(1,59).' minutes', time());

	$db->update_all("resume_expect","`lastupdate`='".$LastTime."'","`id`='".$rs['id']."'");
}


?>