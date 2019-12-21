<HTML>
    <BODY>

<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
?>

  <?php
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

<div class="container">   
   <form method="post" action="#">
<!--     <div class="form-group">
<select name="Color" class="form-control">
<option value="gb">Ganesh Banquet</option>
<option value="viz">Viz Park Hotel</option>
<option value="town">Town Hall</option>
<option value="crs">Crescent Banquet</option>

</select>
</div> -->
<!-- <form method="post" action="#">
    <select name="Color">
<option value="1">1</option>
<option value="2">2</option>

</select> -->
  DATE: <input type="date" name="bday">
  <input type="submit" name="submit" value="GET SELECTED VALUE">
</form>
<?php
        if(isset($_POST['submit'])){
$selected_val = $_POST['bday']; 
            $v = $_SESSION['hall_id_print']; 
            if($selected_val < date('Y-m-d') )
            {
                echo "you cannot book previous dates";
            }
        else
        {
            $t=0;
            $q="select date from book where h_id='$v'";
            $f=mysqli_query($con,$q);
            if ($f ->num_rows > 0){
    while($row = $f-> fetch_assoc()) {
        if($row['date'] == $selected_val)
        {
            $t=1;
        }
    }
}
            if($t == 0)
            {
                echo "you can book";
                $d="INSERT INTO `book`( `h_id`, `ava`, `date`) VALUES ('$v',0,'$selected_val')";
                $l=mysqli_query($con,$d);
            }
            else
            {
                echo "you can not book";
            }
}
       } 
?>

    </BODY>
</HTML>