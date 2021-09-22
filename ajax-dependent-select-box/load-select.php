<?php

    $conn = mysqli_connect("localhost","root","","test1") or die("CONNECTION FAIL");

    if($_POST['type'] == ""){
        $sql = "SELECT * FROM countries";
        $result = mysqli_query($conn,$sql) or die("QUERY ERROR");
        $str = "";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $str.= "<option value='{$row['id']}'>{$row['name']}</option>";
            }
        }
        echo $str ;
    }elseif($_POST['type'] == "cityData"){
        $sql = "SELECT * FROM cities WHERE country_fk_id = {$_POST['id']}";
        $result = mysqli_query($conn,$sql) or die("QUERY ERROR");
        $str = "";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $str.= "<option value='{$row['id']}'>{$row['name']}</option>";
            }
        }
        echo $str ;
    }

?>