<html>
    <body>
<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
$d = date('Y-m-d');
$q1="SELECT date FROM book WHERE date < '$d' ";
        $result1=mysqli_query($con,$q1);
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
            $s= $row1["date"];


            $q2="DELETE from book WHERE date < '$d' ";
            $result2=mysqli_query($con,$q2);
    }
}

        
            
            
        
?>


    </body>
</html>
