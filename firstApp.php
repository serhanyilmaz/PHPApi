<?php  
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$serverName = "SERHAN\SQLADMIN"; 
$uid = "sa";   
$pwd = "Serhan*123";  
$databaseName = "Login"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

if( $conn ) {
//echo "Successfuly connected.<br/>";
}else{
echo "Connection error.<br/>";
die( print_r( sqlsrv_errors(), true));
}



$sql = "select Username,Password from Users";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	$result[] = $row;
}

echo json_encode($result);

sqlsrv_free_stmt( $stmt)



?>  