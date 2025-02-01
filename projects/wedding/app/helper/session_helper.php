<?php
session_start();

function set_session($data= [],$visitor_id = 0) 
{
      if(!empty($data))
      {
            $sanitised_data = sanitise($data);
            foreach($data as $key => $value)
            {
                  $_SESSION[$key] = $value;
            }
      }
      if($visitor_id !== 0) 
      {
            if(isset($_SESSION['visitor_id']) || !empty($_SESSION['visitor_id'])) return;
            
            $_SESSION['visitor_id'] = $visitor_id;

      }

}
function close_session() {
      $_SESSION = [];
      session_unset();
      session_destroy();
}
?>