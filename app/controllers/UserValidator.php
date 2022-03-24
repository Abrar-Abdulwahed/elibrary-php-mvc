<?php 

class UserValidator {
  public $data;
  public $errors = [];
  public static $fields = ['username', 'email', 'password'];

  public function __construct($post_data){
    $this->data = $post_data;
  }

  public function validateForm(){

    foreach(self::$fields as $field){
      if(!array_key_exists($field, $this->data)){
        $this->addError($field, "'$field' is not present in the data");
      }
    }

    $this->emailFormat($this->data['email']);
    $this->min($this->data['password'], 5);
    // $this->required();
    $this->max($this->data['password'], 20);
    return $this->errors;

  }
    // public function required(){
    //     $file = $this->test_input($field);
    //     return !empty($file) === true ? '' :  'is required';
    // }
    public function max($field, $value){
        $len = strlen($field);
        if($len > $value) 
          $this->addError($field, "'$field' must be more than $value");
    }
    public function min($field, $value){
        $len = strlen($field);
        if($len < $value) 
          $this->addError($field, "'$field' must be more than $value");
    }
    public function emailFormat($email){
        // $email = trim($this->data['email']);
        $email = $this->test_input($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          $this->addError('Email', "email Invalid email format");

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

  public function addError($key, $val){
    $this->errors[$key] = $val;
  }

}

?>