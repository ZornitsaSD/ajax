<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  session_start();

  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  if(!is_ajax_request()) { exit; }

  // extract $id
  // store in $_SESSION['favorites']
  // return true/false
isset($_POST['id'])? $raw_id = $_POST['id'] : $raw_id ='';

//echo $raw_id;

if(preg_match("/blog-post-(\d+)/", $raw_id, $matches)){
  $id = $matches[1];
  //echo $id;

  if (!in_array($id, $_SESSION['favorites'])) {
    $_SESSION['favorites'][] = $id;
    // echo join(', ', $_SESSION['favorites']);
    echo 'true';
  } else {
    echo 'in_array';
  }

} else {
    echo "false";
  }


