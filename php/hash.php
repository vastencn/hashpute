<?php
/***************************************************
************* Hashputer processor ******************
********* php implementation v 0.1 beta ************
****************************************************
**************************** by : Matthew DeBlock **
*************************************** NOV 2018 ***
****************************************************


***************************************************/


function hp_hash_config($arg_ar){
  $config_ar=array();

// First byte is config byte
//
// Bit 1-3
//    Size of hash val (num bytes: 1,2,3,4,5,6,7,8)
//
// Bit 4
//    Mask 1 (yes/no)
//
// Bit 5
//    Mask 2 (yes/no)
//
// Bit 7
//    Bit offset (yes/no)
//
// Bit 8
//    Length restrict (yes/no)


  return $config_ar;
  }

function hp_hash(){
  }

?>
