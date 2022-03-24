<?php 

class UserValidator {
  private $data;
  private $errors = [];
  public $model_obj = null;
  private static $fields = ['username', 'email', 'password'];

  public function __construct($post_data, $model_obj){
    $this->data = $post_data;
    $this->$model_obj = $model_obj;
  }

  public function validateForm(){

    foreach(self::$fields as $field){
      if(!array_key_exists($field, $this->data)){
        trigger_error("'$field' is not present in the data");
        return;
      }
    }

    $this->validateUsername();
    $this->validateEmail();
    $this->validatePassword();
    return $this->errors;

  }

  private function validateUsername(){

    $val = trim($this->data['username']);

    if(empty($val)){
      $this->addError('username', 'username cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
        $this->addError('username','username must be 6-12 chars & alphanumeric');
      }
    }

  }

  private function validateEmail(){

    $val = trim($this->data['email']);

    if(empty($val)){
      $this->addError('email', 'email cannot be empty');
    } elseif($this->$model_obj->findUserByEmail($data['email'])) {
        $this->addError('email', 'email is already taken.');
    }else {
      if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
        $this->addError('email', 'email must be a valid email address');
      }
    }

  }

  private function validatePassword(){

    $val = trim($this->data['password']);

    if(empty($val)){
        $this->addError('username', 'username cannot be empty');
      }
      elseif(strlen($val) < 8 and strlen($val) > 20){
        $this->addError('username', 'password must between 8 and 20 length');
      } 
      else {
        if(!preg_match('/^(.{0,7}|[^a-z]*|[^\d]*)$/i', $val)){
          $this->addError('password','Password must be have at least one numeric value.');
        }
      }

  }

  private function addError($key, $val){
    $this->errors[$key] = $val;
  }

}

?>