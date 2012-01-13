
<?php 
  function sql($query){
    $db_conn = ocilogon("CASAAPUESTA", "IRENE", "//127.0.0.1/XE");
	$parsed = ociparse($db_conn, $query);
    ociexecute($parsed);
	ocilogoff($db_conn);
    return $parsed;
 }
?>