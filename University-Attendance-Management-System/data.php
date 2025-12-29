
<?php
$on = new mysqli('localhost','root','','form');

$er = mysqli_query($on,"SELECT * FROM   form");
while($row = mysqli_fetch_array($er)){
    $name = $row ['name'];
    $id = $row['s_id'];
    $phone = $row['phone'];
    echo "<h1>Name is : $name</h1>
    <h2>Id is : $id</h2>
    <h3>Phoine : $phone</h3>
   ";
}
?>
    
