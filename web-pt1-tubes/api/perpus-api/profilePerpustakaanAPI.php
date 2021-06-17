<?php
     require '../../action/config.php';
     include 'functionAPI.php';

     header('WWW-Authenticate: Basic realm="Test Authentication System"');
     header('Content-Type: application/json; charset=UTF-8');
     
     if($_SERVER['REQUEST_METHOD'] == 'GET'){
               if(isset($_SERVER['PHP_AUTH_USER']) AND isset($_SERVER['PHP_AUTH_PW'])) {
                    $dataLogin = loginPerpustakaanAPI($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
                         if($dataLogin) {
                              http_response_code(200);
                              $dataJSON = profilePerpustakaanAPI($dataLogin['email_perpus']);
                              echo json_encode($dataJSON);
                         } else {
                              echo "Gagal, Data Tidak Ada";
                         }
               } else {
                         echo "Gagal Request";
               }
     }
?>