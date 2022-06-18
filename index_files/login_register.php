<?php
require('connection.php');
session_start();
#This is the code for login
if(isset($_POST['login']))
{
    $query = "SELECT * FROM `registered_users` WHERE  `email`= '$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result = mysqli_query($con,$query);
    
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);

            if($result_fetch['is_verified']==1)
            {
                if(password_verify($_POST['password'],$result_fetch['password']))
                {
                    $_SESSION['logged_in']=true;
                    $_SESSION['UserLoginId']=$result_fetch['full_name'];
                    $_SESSION['username'] = $result_fetch['username'];
                    header("location: ../../../index.php");

                }
            
                else
                {
                    echo"
                    <script>
                        alert('Password is incorrect');
                        window.location.href='signin.php';
                    </script>
                ";
                }
            }
            else
            {
                echo"
                    <script>
                        alert('Please verify your email first');
                        window.location.href='signin.php';
                    </script>
                ";  
            }
            
        }
            else
            {
                echo"
                <script>
                    alert('Email not verified please verify it first');
                    window.location.href='signin.php';
                </script>
            "; 
            }
    }
    else
    {
        echo"
            <script>
                alert('Email or Username not registered');
                window.location.href='signin.php';
            </script>
        ";
    }
}
?>