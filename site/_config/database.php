<?php
     
   define('host', 'sql207.epizy.com');
   define('dbname', 'epiz_33634023_docs');
   define('user', 'epiz_33634023');
   define('pass', 'PCC0XJoVM0C');

   try {

    $db = new PDO("mysql:host=" . host . ";dbname=" . dbname, user, pass);

    
   } catch (PDOException $e) {
        echo $e;
   }