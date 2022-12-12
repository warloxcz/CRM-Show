<?php
if(isset($_POST["id"])){
    include_once("../conn.php");
    $id = $_POST["id"];
    foreach ($_POST as $key => $value) {
        if($key != "id"){
            $sql = "UPDATE firm SET $key='".trim($value)."' WHERE id=$id";                                            

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully $key ";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
}
?>