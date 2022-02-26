<?php
ob_start();
session_start();
include'inc/admindb.php';

$table = 'order_lr';
$already = '';
$id = '';
$data = array();

foreach ($_POST as $key => $value)
{
    if($key == 'already')
    {
        $already = $value;
    }
    else if($key == 'id')
    {
        $id = $value;
    }
    else
    {
        $data[] = $key." = '".$value."'";
    }
}

$commadata = implode(", " , $data);

if($already == 'yes')
{
    $query = "UPDATE ".$table." SET ".$commadata." WHERE id = '".$id."'";
}
else
{
    $query = "INSERT INTO ".$table." SET ".$commadata;
}

$runquery = mysqli_query($con, $query);

if($runquery)
{
    echo "success";
    //header('Location:'.$redirect.'.php');
}
else
{
    $error = 'Some error occurred';
}

?>