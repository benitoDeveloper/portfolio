<?php
function sanitise($arr) 
{
      $sanitised_arr = [];
      foreach($arr as $key => $item)
      {
            $sanitised_arr[$key] = htmlspecialchars(trim($item));
      }
      return $sanitised_arr;
}

function flash_msg($name = '',$message = '', $class = 'success')
{
      if(!empty($name))
      {
            if(!empty($message) && empty($_SESSION[$name]))
            {
                  if(!empty($_SESSION['name']))
                  {
                        unset($_SESSION['name']);
                  }
                  if(!empty($_SESSION[$name. '_class']))
                  {
                        unset($_SESSION[$name . '_class']);
                  }
                  $_SESSION[$name] = $message;
                  $_SESSION['flash-status'] = 'flash-' . $class;
            }elseif(empty($message) && !empty($_SESSION[$name]))
            {
                  echo '<div class=' . $_SESSION['flash-status'] . ' id="flash-msg" >'. $_SESSION[$name] . '</div>';
                  unset($_SESSION[$name]);
                  unset($_SESSION[$name.'_class']);
            }
      }
}

?>