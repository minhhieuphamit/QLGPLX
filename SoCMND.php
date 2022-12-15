
<?php  
 include("config.php");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $soCMND = $_POST["query"];
      $query = "SELECT * FROM LyLich WHERE SoCCCD LIKE '%$soCMND%'"; 
      $result = sqlsrv_query($conn, $query);  
      $rows = sqlsrv_has_rows( $result );
      $output = '<ul class="list-unstyled">';  
      if($rows === true)  
      {  
            while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) 
           {  
            $output .= '<li>'.$row['SoCCCD'].'</li>';
           }  
      }  
      else  
      {  
           $output .= '<li>So CMND khong hop le</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  