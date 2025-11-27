<?php
     // MAIN DATABASE CONNECTION

//   $usermain = 'acarlprf';
   $usermain = 'acarlprf_user';
   $password = 'password!aname';
  // $password = 'rHwycMnY7LUM';
     // $lgdb = 'lg_db';
     $lgdb = 'acarlprf_lg_db';
   $host = 'server301.web-hosting.com/cpanel';
   $host = 'server301.web-hosting.com';
    //$host = '68.65.120.88';
    $port = 3306;
  // $port = 21098;
    // set local host address
    $whitelist = array( 
        '127.0.0.1',
        '::1'
    );
    // check if local host, then run local connect
    if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        $usermain = 'root';
        $password = 'root';
        $lgdb = 'lg_db';
        $host = '127.0.0.1';
        $host = 'localhost';
        $port = 8889;
    }

    $link = $GLOBALS['link'] = mysqli_init();
    $conn = mysqli_real_connect(
        $link,
        $host,
        $usermain,
        $password,
        $lgdb,
        $port
        );
        ?>
