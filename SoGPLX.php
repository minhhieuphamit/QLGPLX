
<?php  
 include("config.php");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $SoGPLX = $_POST["query"];
      $query = "SELECT * FROM HoSoGPLX WHERE MaGPLX LIKE '%$SoGPLX%'"; 
      $result = sqlsrv_query($conn, $query); 
      $rows = sqlsrv_has_rows($result);
      $output = '<ul class="list-unstyled">';  
      if($rows === true)  
      {  
            while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) 
           {  
            $output .= '<li>'.$row['MaGPLX'].'</li>';
           }  
      }  
      else  
      {  
           $output .= '<li>Mã GPLX không hợp lệ!!!</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  