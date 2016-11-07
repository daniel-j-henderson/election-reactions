<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('../election.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
//      echo "Opened database successfully\n";
    }

   $response = $_GET["textfield"];
   $ret = $db->exec("insert into responses values ('$response', '1');");
   if(!$ret){
      echo $db->lastErrorMsg();
      $db->exec("update responses set votes=votes+1 where response == '$response';");
   } else {
      //echo $db->changes(), " Record updated successfully\n";
   }
   //echo "Operation done successfully\n";
   $db->close();
?>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Election Reactions</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/main.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
      <main class="success">
        <h1>Success!</h1>
        <h3>You successfully submitted a response. <br>Click <a href="index.php">HERE</a> to return to the main page</h3>
      </main>
    </body>
</html>
