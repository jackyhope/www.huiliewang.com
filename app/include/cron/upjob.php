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

$query = $db->query("SELECT r1.id FROM $db_config[def]company_job AS r1 JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM $db_config[def]company_job)) AS id) AS r2 WHERE r1.id >= r2.id AND `edate`>'".time()."' AND `state`=1 AND `r_status`<>2 AND `status`<>1 ORDER BY r1.id ASC LIMIT 30");

while($rs = $db->fetch_array($query))
{
	
	$LastTime = strtotime('-'.rand(1,59).' minutes', time());

	$db->update_all("company_job","`lastupdate`='".$LastTime."'","`id`='".$rs['id']."'");
}


?>