 <?php 

function conn()
{
   $serverName="localhost";
   $userName="root";
   $pass="";
   $dbName="advance_school_portal";
   $conn=new mysqli($serverName,$userName,$pass,$dbName);
   return $conn;
}
 


?>