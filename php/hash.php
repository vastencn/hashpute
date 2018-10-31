<?php
/***************************************************
************* Hashputer processor ******************
********* php implementation v 0.1 beta ************
****************************************************
**************************** by : Matthew DeBlock **
*************************************** NOV 2018 ***
****************************************************


***************************************************/




// Configure from a byte array
// returns array
// [0] = number of bytes
// [1] = number of masks
// [2] = Direction
// [3] = Has Offset
// [4] = Has Length Terminator
function hp_hash_config($arg_ar){
  $config_ar=array();

// First byte is config byte
//
// Bit 1-3
//    Size of hash val (num bytes: 1,2,3,4,5,6,7,8)
//
// Bits 4-5
//    Number of Mask Layers (0,1,2,3)
//
// Bit 6
//    Forward/Reverse
//
// Bit 7
//    Bit offset (yes/no)
//
// Bit 8
//    Length restrict (yes/no)


  //check first three bits for the bytesize
  $config_ar[0]=($arg_ar[0]&0b111)+1;

  //next 2 bits ar number of masks
  $config_ar[1]=($arg_ar[0]>>3)&0b11;

  //next check direction
  $config_ar[2]=($arg_ar[0]>>5)&1;

  //next check if doing offset
  $config_ar[3]=($arg_ar[0]>>6)&1;

  //finally check if doing length restrict
  $config_ar[4]=($arg_ar[0]>>7)&1;

  //size = byte size * ( 1 + number of masks ) + 1 for config byte
  $total_size=$config_ar[0]*(1+$config_ar[1]);

  //number of hash streams = 1 + number of masks
  $num_hash_streams=1+$config_ar[0];

  //make sure we have enough data
  if(count($arg_ar)<$total_size){
    return NULL;
    }

  //load hash stream starting vals
  $arg_index=1;
  $config_index=1;

  //loop through streams
  for($i=0;$i<$num_hash_streams;$i++){
    $config_index++;
    $config_ar[$config_index]=0;

    //loop and load bytes
    for($j=0;$j<$byte_size;$j++){
      $config_ar[$config_index]<<=8;
      $config_ar[$config_index]+=$arg_ar[$arg_index++];
      }
    }

  return $config_ar;
  }

function hp_hash(){
  }

?>
