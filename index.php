
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <title>Common English Words Project</title>
<?php
include './index_files/connection.php';
session_start();
?>
    <style>
        body
        {
            margin: 0px;
            padding:0px;
            font-family: 'Roboto', sans-serif;
            background: #25b7c4;
        }
        main
        {
            display: flex;
            width: 100%;
            flex-direction: column;
            align-items: center;
            color: #fff;
            font-size:1.05rem;
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
        }
        ::-webkit-scrollbar 
        {
            width: 10px;
        } 
        ::-webkit-scrollbar-track 
        {
           -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
           box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
           
        } 
        ::-webkit-scrollbar-thumb 
        {
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
          box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }
        header
        {
            position: absolute;
            text-align: right;
            width:100%;
        } 
        header a
        {
            margin-right:3rem;
            text-decoration: none;
        }
        header a button
        {
            background: transparent;
            border: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            width:8rem;
            height: 2rem;
            color: #fff;
            font-size:1.1rem ;
            background: -webkit-linear-gradient(to right, #21caca, #29c5d2);
            background: linear-gradient(to right, #21caca, #29c5d2);
            }
        header a button:active
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }
        #logo_holder
        {
            text-align: center;
            width: 100%;
            margin: 1.5rem 0 3rem 0;
        }
/*search bar css start*/
        #myInput
        {
            border-radius: 20px;
    width: 22rem;
    background: rgba( 255, 255, 255, 0.25 );;
    backdrop-filter: blur( 4px );
    -webkit-backdrop-filter: blur( 4px );
    border: 1px solid rgb(255 255 255 / 68%);
    height: 2.5rem;
    box-sizing: border-box;
    padding: 5px 5px 5px 10px;
    color: #fff;
    outline:none;
    margin: 5px 0 3rem 11px;
    font-size:1rem;
        }
        #myInput::placeholder
        {
            color:#fff;
        }
        /*search bar css end*/
        table
        {
            width: 50rem;
        }

        .edit_tab
        {
            background: -webkit-linear-gradient(to right, #32e79b, #29c5d2);
            background: linear-gradient(to right, #32e79b, #29c5d2);
            box-sizing: border-box;
            text-align: right;
        }
        #edit_panel
        {
            display: grid;
            grid-template-columns: 20px 1fr;

        }
        #word_no
        {
            margin: 9px 0;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .edit_tab td
        {
          box-sizing: border-box;
        }
        .edit_del_btn
        {
            border: none;
            padding: 5px 7px 0px 0;
            box-sizing: border-box;
            background: transparent;
        }
        #word_no_holder, #edit_del_holder
        {
            display: flex;
            justify-content: flex-end;
        }
        .warning_holder
        {
            height: 100vh;
            width: 100%;
            backdrop-filter: blur( 4px );
            background: rgb(255 255 255 / 54%);
            display: flex;
            position: fixed;
            overflow: hidden;
            display:none;

        }
        .warning
        {
            width: 20rem;
            height: 15rem;
            font-size: 1.1rem;
            font-family: sans-serif;
            font-weight: 600;
            background: rgb(255 255 255 / 54%);
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border: 1px solid rgb(255 255 255 / 56%);
            text-align: center;
            color: #000;
            box-sizing: border-box;
            padding: 50px 20px 0 20px;
            color: #67D3B6;
            position: absolute;
            top: 50%; 
            right: 50%;
            transform: translate(50%,-50%);

        }
        .warning button
        {
            background: #32e79bd4;
            border: none;
            width: 5rem;
            height: 2rem;
            cursor: pointer;
            color: #fff;
        }
        td
        {
            box-sizing: border-box;
        }
        
        .def td, .wrd td
        {
                background: rgba( 255, 255, 255, 0.25 );
                backdrop-filter: blur( 4px );
                -webkit-backdrop-filter: blur( 4px );
                border: 1px solid rgba( 255, 255, 255, 0.18 );
                padding: 8px;
        }
        .ex
        {
            border-bottom: 2px solid #3ee6b9;
        }
        .disclaimer
        {
            display:none;
        }
        #nav
        {
            z-index: 10;
            position: fixed;
            bottom: 18px;
            right: 18px;
            background: rgba( 255, 255, 255, 0.25 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            border-radius: 50%;
            padding: 12px 12px 11px 15px;
        }
        nav svg
        {
            width:25.936px;
            height:25.936px;
            fill:#fff;
        }
       @media screen and (max-width:600px)
       {
           .logo
           {
               width: 201px;
           }
           header a 
           {
            margin-right: 1rem;
           }
           header a button 
           {
           border-bottom-left-radius: 7px;
           border-bottom-right-radius: 7px;
           width: 5rem;
           height: 1.6rem;
           color: #fff;
           font-size: 1rem;
           background: -webkit-linear-gradient(to right, #21caca, #29c5d2);
           background: linear-gradient(to right, #21caca, #29c5d2);
           }
       }

       @media screen and (max-width:51rem)
       {
        table
        {
            width: 100%;
        }
       }
       @media screen and (max-width:20rem)
       {
           .warning
           {
               width: 100%;
           }
       }
    </style>
</head>
<body>
    <header>
    <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <a href='./index_files/logout.php'>
        <button style='cursor:pointer;' class='account_button_signin' type='button'>
          Logout
        </button>
        </a>
      ";
      }
      else
      {
        echo"
        <a href='./index_files/Admin Login.php'>
        <button style='cursor:pointer;' class='account_button_signin' type='button'>
          Sign in
        </button>
        </a>
      ";
      }
      ?>
    </header>
    <main>
    <DIV id="logo_holder" ><img src='./index_files/logo.png' class='logo'></DIV>
    <!-- <input placeholder="Search any word.." id='myInput' onkeyup="searchFun()"/> -->
    <table id='myTable'>
        
        <?php
            $selectquery = "select * from products ";
            $query = mysqli_query($con,$selectquery);
            while($res = mysqli_fetch_array($query))
            {
        ?>
        <tr class="edit_tab">
            <td class="container" colspan="2" height="40px" >
            <div id="edit_panel">
            <div id="word_no_holder"><p id="word_no"><?php echo $res['id']; ?></p></div>
            <div id="edit_del_holder">
            <button id='editting_btn' onclick = "edit_word('<?php echo $res['id']; ?>')" class='edit_del_btn'>    
            
            <svg xmlns="http://www.w3.org/2000/svg"  class="edit" fill="#fff" style="cursor:pointer;" version="1.0" width="17.000000pt" height="17.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
            <path d="M875 5101 c-314 -79 -538 -317 -601 -639 -21 -110 -21 -3694 0 -3804 55 -280 230 -496 486 -601 131 -54 161 -57 613 -57 391 0 420 1 455 19 47 24 77 56 97 103 40 98 -1 210 -97 259 -34 18 -63 19 -385 19 -191 1 -378 5 -415 9 -175 23 -316 152 -348 320 -14 74 -14 3588 0 3662 32 168 173 297 348 320 88 11 2446 11 2534 0 175 -23 316 -152 348 -320 6 -33 10 -305 10 -700 l0 -647 23 -44 c12 -24 39 -57 60 -74 32 -26 49 -31 106 -34 100 -6 170 35 206 120 22 54 23 1336 1 1450 -65 329 -295 569 -614 642 -63 14 -214 16 -1414 15 -1246 0 -1348 -2 -1413 -18z"/>
            <path d="M1175 3904 c-138 -71 -154 -251 -32 -348 l39 -31 1099 -3 c1066 -2 1100 -2 1137 17 150 77 150 285 0 362 -36 18 -75 19 -1125 19 -966 0 -1091 -2 -1118 -16z"/>
            <path d="M1175 3104 c-138 -71 -154 -251 -32 -348 l39 -31 1099 -3 c1066 -2 1100 -2 1137 17 150 77 150 285 0 362 -36 18 -75 19 -1125 19 -966 0 -1091 -2 -1118 -16z"/>
            <path d="M4101 2385 c-80 -23 -136 -50 -205 -99 -33 -24 -318 -302 -633 -618 l-571 -573 -36 -115 c-212 -691 -219 -715 -220 -782 -1 -59 3 -71 29 -110 17 -23 49 -53 70 -65 71 -40 111 -34 562 91 226 63 426 122 445 131 18 9 297 281 619 603 583 583 587 588 628 672 92 189 93 371 2 555 -66 134 -192 245 -334 295 -82 29 -275 37 -356 15z m226 -406 c64 -24 123 -109 123 -179 0 -45 -30 -108 -67 -142 l-29 -28 -134 135 -134 134 29 32 c17 17 44 37 60 45 36 16 113 18 152 3z m-630 -1006 l-367 -368 -192 -53 c-105 -29 -192 -51 -193 -50 -2 2 23 87 54 191 l56 187 368 367 368 367 137 -137 137 -137 -368 -367z"/>
             <path d="M1175 2304 c-138 -72 -154 -251 -32 -348 l39 -31 708 0 708 0 39 31 c109 87 109 241 0 328 l-39 31 -696 3 c-618 2 -700 0 -727 -14z"/>
             </g>
             </svg>
             
            </button>  
            <button id='delete__btn' onclick = "edit_word('<?php echo $res['id']; ?>')" class='edit_del_btn' >   
            
            <svg xmlns="http://www.w3.org/2000/svg" class="cancel" fill="#fff" viewBox="0 0 30 30" width="30px" style="cursor:pointer;" height="30px">    
            <path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16.414,15 c0,0,3.139,3.139,3.293,3.293c0.391,0.391,0.391,1.024,0,1.414c-0.391,0.391-1.024,0.391-1.414,0C18.139,19.554,15,16.414,15,16.414 s-3.139,3.139-3.293,3.293c-0.391,0.391-1.024,0.391-1.414,0c-0.391-0.391-0.391-1.024,0-1.414C10.446,18.139,13.586,15,13.586,15 s-3.139-3.139-3.293-3.293c-0.391-0.391-0.391-1.024,0-1.414c0.391-0.391,1.024-0.391,1.414,0C11.861,10.446,15,13.586,15,13.586 s3.139-3.139,3.293-3.293c0.391-0.391,1.024-0.391,1.414,0c0.391,0.391,0.391,1.024,0,1.414C19.554,11.861,16.414,15,16.414,15z"/>
            </svg>
            
            </button>  
            </div>
            </div>
            </td>
        </tr>      
        <tr class="wrd">
            <td class="men" height="40px"><?php echo $res['word']; ?></td>
            <td class="men" height="40px"><?php echo $res['word_meaning']; ?></td>
        </tr>
        <tr class="def">
            <td colspan="2" ><b>Definition - </b><?php echo $res['description']; ?></td>
        </tr>
        <tr class="def ex">
            <td colspan="2" ><b>EX - </b><?php echo $res['example']; ?></td>
        </tr>
        <tr >
            <td colspan="2"  style="border: none;" height="50px"></td>
        </tr>
        <?php
            }
        ?>
        <!--PHP ENDS-->
    </table>
    <div class="warning_holder warning1">
      <div class='warning'>
      <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <h3>Do you want to <span style='color: #CC313D;'>Delete</span> the word</h3>
        <div>
            <form method='POST' style='display: inline;' action='./index_files/remove_word.php' name = 'del_form' id='cancel_btn'>
            <input type='hidden' name='rmv_word_id' >
            <button name='Del_word' type='submit'>Yes</button>
            </form>
            <button class='del_no'>No</button>
        </div>
        ";
      }
      else
      {
        echo"
        <div style='margin-top: 3.3rem;'>
        <a style='text-decoration:none;' href='./index_files/Admin Login.php'>
        <button class='account_button_signin' type='button'>
          Sign in
        </button>
        </a>
        <button class='del_no'>No</button>
        </div>
      ";
      }
      ?>
      </div>
    </div>
    <div class="warning_holder warning2">
    <div class='warning'>
            <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <h3>Do you want to <span style='color: #31cc9d;'>Edit</span> the word</h3>
        <div>
            <form method='POST' style='display: inline;' action='./index_files/edit_word.php' name = 'edit_form' id='edit_btn'>
            <input type='hidden' name='edit_word_id'>
            <button name='edit_word' type='submit'>Yes</button>
            </form>
            
            <button class='edit_no'>No</button>
        </div>

      ";
      }
      else
      {
        echo"
        <div style='margin-top: 3.3rem;'>
        <a style='text-decoration:none;' href='./index_files/Admin Login.php'>
        <button class='account_button_signin' type='button'>
          Sign in
        </button>
        </a>
        <button class='edit_no'>No</button>
        </div>
      ";
      }
      ?>

    </div>
    </div>
    <a href="./index_files/Add Word.php"><nav id='nav'>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" id='writing_button' viewBox="0 0 494.936 494.936" style="enable-background:new 0 0 494.936 494.936;" xml:space="preserve">
    <g>
	    <g>
		<path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157    c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21    s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741    c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
		<path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069    c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963    c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692    C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107    l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005    c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
	    </g>
    </g>
</svg>
    </nav></a>
    
    </man>
    <!-- <script>
    const searchFun = () =>{
        let filter = document.getElementById('myInput').value.toUpperCase();
        let myTable = document.getElementById('myTable');
        let tr = myTable.getElementsByClassName('wrd');
        let trDef = myTable.getElementsByClassName('def');
        let trex = myTable.getElementsByClassName('ex');
        let wordedit = myTable.getElementsByClassName('edit_tab');

        for(var i=0;i<tr.length;i++)
        {
            let td = tr[i].getElementsByTagName('td')[0];
            if(td){
                let textvalue = td.textContent || td.innerHTML;
                
                if(textvalue.toUpperCase().indexOf(filter) > -1)
                {
                    tr[i].style.display = "";
                    wordedit[i].style.display = "";
                }
                else
                {
                    tr[i].style.display = "none";
                    wordedit[i].style.display = "none";
                }
            }
        }
    }
    </script>  -->


        <script>
        //cancel tab button
                $(document).ready(function() {
        
                   $(".cancel").click(function(){
                      $(".warning1").toggle();
                   });
                });
        //cancel no button
                $(document).ready(function() {
        
                   $(".edit_no").click(function(){
                      $(".warning2").toggle();
                   });
                });
        //edit tab button
                $(document).ready(function() {
        
                   $(".edit").click(function(){
                      $(".warning2").toggle();
                   });
                });
        //edit no button
                $(document).ready(function() {
        
                   $(".del_no").click(function(){
                      $(".warning1").toggle();
                   });
                });
    </script>
    <script>
        function edit_word(id)
        {
                del_form.rmv_word_id.value = id;
                edit_form.edit_word_id.value = id;
        }
        
    </script>
</body>
</html>