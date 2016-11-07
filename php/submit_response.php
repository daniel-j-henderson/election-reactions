<?php
   class MyDB extends SQLite3
   {
      function __construct(fname)
      {
         $this->open(fname);
      }
   }
   $db = new MyDB('election.db');
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
    }

    $res = $_GET["textfield"];

   $sql =<<<EOF
      insert into responses values ($res, 10);
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo $db->changes(), " Record updated successfully\n";
   }
//
//    $sql =<<<EOF
//       SELECT * from COMPANY;
// EOF;
//    $ret = $db->query($sql);
//    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
//       echo "ID = ". $row['ID'] . "\n";
//       echo "NAME = ". $row['NAME'] ."\n";
//       echo "ADDRESS = ". $row['ADDRESS'] ."\n";
//       echo "SALARY =  ".$row['SALARY'] ."\n\n";
//    }
   echo "Operation done successfully\n";
   $db->close();
?>
