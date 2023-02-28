<?php
require './session_check.php';


function validImage($imageFile){
    $file_name=$imageFile['name'];
    $file_type=$imageFile['type'];
    $file_tmp_name=$imageFile['tmp_name'];
    $file_error=$imageFile['error'];
    $file_size=$imageFile['size'];
  
  
  
    if($file_error===0){
      if ($file_size>2000000) {
       $em="Sorry, your file is too large.";
        return $em;
       exit;
      }
     else{
        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_ex_lc=strtolower($file_ex);
  
            $allowed_exs=array("jpg","jpeg","png");
  
            if (in_array($file_ex_lc,$allowed_exs)) {
              $em="valid";
              return $em;
            }
            else{
              $em="You can't upload files of this type.";
              return $em;
              exit;
            }
  
  
  
      }
    }
    else{
        $em="Checked,unknown error occured!";
        return $em;
        exit;
      }
}

function validMultipleImage($imageFile){
  $em="";
  // var_dump($imageFile);
  
  for ($i=0; $i < count($imageFile['name']) ; $i++) { 

        $file_name=$imageFile['name'][$i];
        $file_type=$imageFile['type'][$i];
        $file_tmp_name=$imageFile['tmp_name'][$i];
        $file_error=$imageFile['error'][$i];
        $file_size=$imageFile['size'][$i];
    
    
        if($file_error===0){
          if ($file_size>2000000) {
           $em=" Sorry, your file is too large.";
           return $em;
          exit;
          }
         else{
            $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
            $file_ex_lc=strtolower($file_ex);
      
                $allowed_exs=array("jpg","jpeg","png");
      
                if (in_array($file_ex_lc,$allowed_exs)) {
                    $em="valid";
                    
                   
                }
                else{
                  $em="You can't upload files of this type.";
                  return $em;
                   exit;
                }
    
      
      
      
          }
        }
    
    
        else{
          $em="unknown error occured!";
          return $em;
          exit;
        }
    
    
        
    
   }
return $em;

}

?>