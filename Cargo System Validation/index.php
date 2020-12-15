<?php

$items = json_decode(file_get_contents('php://input'),true);

if(!$items)
  echo "You'r Input is Invalid!";
else{
  $type = ['S', 'L'];
  $door_size_heigth = 7;
  $door_size_width = 5;
  $max_weight = 20;
  $max_width = 10;
  $max_height = 10;
  $max_length = 10;
  $min_temp = 20;
  $max_temp = 30;
  $now_weight = 0;
  $accepted = [];
  foreach($items as $item){
    if(array_key_exists('packageId', $item) && array_key_exists('type', $item) && array_key_exists('weight', $item)){
      if(in_array($item['type'], $type)){
        if ($now_weight+$item['weight'] <= $max_weight) {
            if ($item['type'] === 'S') {
              if (array_key_exists('width', $item) && array_key_exists('height', $item) && array_key_exists('length', $item)) {
                  if ($item['width'] <= $door_size_width && $item['height'] <= $door_size_heigth || $item['length'] <= $door_size_heigth && $item['length'] <= $max_length && $item['weight'] <= $max_weight && $item['height'] <= $max_height) {
                      $now_weight += $item['weight'];
                      echo $item['packageId'].': PASS<br>';
                      $accepted[] = $item['packageId'];
                  } else 
                      echo $item['packageId'].': REJECT<br>';
              }else
                echo $item['packageId'].': REJECT<br>';
            } elseif ($item['type'] === 'L') {
              if (array_key_exists('temperature', $item)) {
                  if ($item['temperature'] >= $min_temp && $item['temperature'] <= $max_temp && $item['weight'] <= $max_weight) {
                      $now_weight += $item['weight'];
                      echo $item['packageId'].': PASS<br>';
                      $accepted[] = $item['packageId'];
                  } else {
                      echo $item['packageId'].': REJECT<br>';
                  }
              }else
                echo $item['packageId'].': REJECT<br>';
            }
        }else
          echo $item['packageId'].': REJECT<br>';
      }else
        echo "Item Type is Not Available!";
    }else
      echo $item['packageId'].': REJECT<br>';
  }
  echo "Item in Cargo :";
  echo '['.implode(', ', $accepted).']';
}