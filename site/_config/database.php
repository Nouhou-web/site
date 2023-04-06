<?php
     
   define('host', 'localhost');
   define('dbname', '');
   define('user', 'root');
   define('pass', '');

   try {

    $db = new PDO("mysql:host=" . host . ";dbname=" . dbname, user, pass);

    
   } catch (PDOException $e) {
        echo $e;
   }
