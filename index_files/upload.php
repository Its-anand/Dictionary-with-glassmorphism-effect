<?php 
include 'connection.php';
if(isset($_POST['submit']))
{   

    $word=$_POST['word'];
    $word_meaning = $_POST['word_meaning'];
    $description = $_POST['description'];
    $example=$_POST['example'];

    $query="INSERT INTO `products`(`word`, `word_meaning`, `description`, `example`) VALUES ('$word','$word_meaning','$description','$example')";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo"
        <script>
        alert('Uploaded Successfully');
        window.location.href='../index.php';
        </script>
        ";
    }
    else
    {
        echo"
        <script>
        alert('Upload Failed');
        window.location.href='../index.php';
        </script>
        ";
    }
}
?>