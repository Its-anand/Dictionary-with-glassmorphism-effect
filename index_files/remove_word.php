<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['logged_in']))
{
    header("location: ./index_files/Admin Login.php");
}
if(isset($_POST['Del_word']))
{
$word_id = $_POST['rmv_word_id'];
echo $word_id;
$query = "SELECT * FROM products where id = '$word_id'";
$result = mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $deletequery = "DELETE FROM `products` WHERE id = '$word_id'";
            $query = mysqli_query($con, $deletequery);
            echo"
            <script>
            alert('Word has been removed');
            window.location.href='../index.php';
            </script>
            "; 
        }
        else
        {
            echo"
            <script>
            alert('Sorry! Word can't be deleted due to some error.);
             window.location.href='../index.php';
            </script>
            ";  
        }
    }   
    else
    {
        echo"
        <script>
        alert('Word not found');
            window.location.href='../index.php';
        </script>
        "; 
    }   
    
}
else
    {
        echo"
        <script>
        alert('Click the delete button first');
            window.location.href='../index.php';
        </script>
        "; 
    }
?>