<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['logged_in']))
{
    header("location: Admin Login.php");
}
    if(isset($_POST['update']))
    {
        $word_id = $_POST['word_id'];
        $updated_word = $_POST['word'];
        $updated_word_meaning = $_POST['word_meaning'];
        $updated_description = $_POST['description'];
        $updated_example = $_POST['example'];
    
        $updated_quary = "UPDATE `products` SET `word`='$updated_word',`word_meaning`='$updated_word_meaning',`description`='$updated_description',`example`='$updated_example' WHERE id = '$word_id'";
        $result = mysqli_query($con,$updated_quary);
        if($result)
        {
            echo"
            <script>
            alert('Word has been updated');
            window.location.href='../index.php';
            </script>
            "; 
        }
        else
        {
            echo"
            <script>
            alert('Error! Word has not been updated');
            window.location.href='../index.php';
            </script>
            "; 
        }
    }
?>