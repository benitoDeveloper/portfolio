<?php
session_start();

function flash_msg($name = '',$message= '',$class = 'flash-success') {
      if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])) {
                  if(!empty($_SESSION[$name])) {
                        unset($_SESSION[$name]);
                  }
                  if(!empty($_SESSION[$name . '_class'])) {
                        unset($_SESSION[$name . '_class']);
                  }
                  $_SESSION[$name] = $message;
                  $_SESSION[$name . '_class'] = $class;
            }elseif(empty($message) && !empty($_SESSION[$name])) {
                  $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                  echo '<div class=' . $class . ' id="flash-msg" >'. $_SESSION[$name] . '</div>';
                  unset($_SESSION[$name]);
                  unset($_SESSION[$name.'_class']);
            }
      }
}

function verify_password($user, $password) {
      
      if(password_verify($user, $password)) {
            var_dump($user->password);
      }
}
function is_logged_in() {
      return isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])? true: false;
}


?>
