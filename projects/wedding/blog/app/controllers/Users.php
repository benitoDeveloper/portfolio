<?php

class Users extends Controller 
{
      protected $user_model;
      public function __construct()
      {
            $this->user_model = $this->model('User');
      }

      public function register()
      {
            if($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                  // process form
                  $data = [
                        'name'=> htmlspecialchars(rtrim($_POST['name'])),
                        'email'=> filter_var(rtrim($_POST['email']),FILTER_SANITIZE_EMAIL),
                        'password'=> htmlspecialchars(rtrim($_POST['password'])),
                        'confirm_password'=> htmlspecialchars(rtrim($_POST['confirm_password'])),
                        'name_err'=> '',
                        'email_err'=> '',
                        'password_err'=> '',
                        'confirmPass_err'=> ''
                  ];
                  if(empty($data['name'])){
                        $data['name_err'] = 'Please provide a valid name';
                  }
                  if(empty($data['email'])){
                        $data['email_err'] = 'Please provide a valid email';
                  }else {
                        if($this->user_model->emailAlreadyExist($data['email'])) {
                              $data['email_err'] = 'This email already exist';
                        }
                  }
                  if(empty($data['password'])){
                        $data['password_err'] = 'Please provide a password';
                  }
                  if(empty($data['confirm_password'])){
                        $data['confirmPass_err'] = 'Please provide a valid password';
                  }elseif($data['password'] !== $data['confirm_password']) {
                        $data['confirmPass_err'] = 'Password does not match';
                  }
                  if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmPass_err'])) {
                        if($this->user_model->register($data)) {
                              flash_msg('register_success', 'You succesfully registered');
                              redirect('users/register');
                        }else {
                              die('Could not register');
                        }
                  } else {
                        $this->view('users/register', $data);
                  }

            }else 
            {
                  // load form
                  $data = [
                        'name'=> '',
                        'email'=> '',
                        'password'=> '',
                        'confirm_password'=> '',
                        'name_err'=> '',
                        'email_err'=> '',
                        'password_err'=> '',
                        'confirmPass_err'=> ''
                  ];
                  // load view
                  $this->view('users/register', $data);
            }
      }
      public function login()
      {
            if($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                  // process form
                  $data = [
                        'email'=> filter_var(rtrim($_POST['email']),FILTER_SANITIZE_EMAIL),
                        'password'=> htmlspecialchars(rtrim($_POST['password'])),
                        'email_err' => '',
                        'password_err' => ''
                  ];
                  if(empty($data['email'])) {
                        $data['email_err'] = 'Please provide an email';
                  }

                  if(empty($data['password'])) {
                        $data['password_err'] = 'Please provide a password';
                  }
                  if(empty($data['email_err']) && empty($data['password_err'])){
                                    // var_dump($data);
                                    // return;


                        $logged_in_user = $this->user_model->log_into_account($data['email'], $data['password']);

                        if($logged_in_user) {
                              // create session
                              $this->create_user_session($logged_in_user);
                              return;
                        }
                        $data['password_err'] = 'Email or password is invalid';
                        $data['email_err'] = 'Email or password is invalid';



                  }
                  // else {
                        $this->view('users/login', $data);
                        return;
                  // }


            }else 
            {
                  // load form
                  $data = [
                        'email'=> '',
                        'password'=> '',
                        'email_err'=> '',
                        'password_err'=> '',
                  ];
                  // load view
                  $this->view('users/login', $data);
            }
      }
      public function create_user_session($user) {
            if(!empty($user)) {
                  $_SESSION['user_id'] = $user->id;
                  $_SESSION['user_email'] = $user->email;
                  $_SESSION['user_name'] = $user->name;
                  redirect('posts');
            }
      }
      public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect(('pages/index'));
      }


}
?>