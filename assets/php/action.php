<?php
  
//    $servername = "mysql.hostinger.ru";
//    $username = "u417942590_alex";
//    $password = "#Qp+S:j#8Xj";
//    $Database = "u417942590_com";

    $servername = "localhost";
    $username = "mysql";
    $password = "mysql";
    $Database = "sample";



// Create connection
global $con, $db;
$con= mysqli_connect($servername, $username, $password);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
    else
        mysqli_select_db($con,$Database);




  function commnts_output($con){

      $sql = "SELECT cname, cdate, 	messege 
              FROM comments
              ORDER BY cdate";
      $res = mysqli_query($con,$sql);

      while (list ($name, $date, $text) = mysqli_fetch_array($res)){
          $resulte.= "<li>
                <article>
                    <header>
                        <h3><a href=\"#\">$name</a></h3>
                        <p>$text</p>
                        <time class=\"published\" datetime=\"$date\">".$date."</time>
                    </header>
                    <a href=\"#\" class=\"image\"><img src=\"images/ico_avatar.png\" alt=\"\"></a>
                </article>
            </li>";

      }
      echo $resulte;
  }

   function ad_comments($con){

    $name = $_POST['name_com'];
    $text= $_POST['message'];

       $sql = "INSERT INTO comments (cname, messege) VALUES (\"$name\",'$text')";
       mysqli_query($con, $sql);

       header('location:'.$_SERVER['HTTP_REFERER']);
       die();
}
  ?>