<?php
// Create a class that will take in an associative array, typically from post data i.e. [user: "john", email:"john@chickenlicken.com" password: "john123" password: confirm: "john123];
// To create a multi functioning object that filters based only on the fields that are used on the form
//either check if the key is there or get the users to put put variables in.  

class Filtering {
    //DECLARE VARIABLES
    private $data;
    private $errors;

    //CREATE CONSTRUCTOR
    public function __construct($inputData){ 
        $this->data = $inputData; 
    }
    //CREATE PUBLIC FUNCTION
    public function validateData (){ 
    if (array_key_exists('user', $this->data)){
        $this->characterCount();
    }
    if (array_key_exists('email', $this->data)){
        $this->emailCheck();
    }
    if (array_key_exists('pwd', $this->data)){
        $this->checkPassword();
    }
    if (array_key_exists('confirm-pwd', $this->data)){
        $this->confirmPassword();
    }
        return $this->errors;    
    }

    //PRIVATE FUNCTION
    private function characterCount(){
        $stringLength = strlen($this->data['user']);
            if ($stringLength > 10 || $stringLength < 4){
                $this->errors["user"]= "User name must be between 4 and 10 characters";
                return; 
        }
    }
    private function emailCheck(){
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors["email"]= "Invalid email, please check again";
                return; 
        }
    }
    private function checkPassword(){
        $stringLength = strlen($this->data['pwd']);
        if ($stringLength < 8){
            $this->errors["pwd1"]= "Password must be 8 characters or more";
        }
        if (!preg_match("#[0-9]+#", $this->data['pwd'])){
            $this->errors["pwd2"]= "Please include a number in your password";
        }
        if (!preg_match("#[A-Z]+#", $this->data['pwd'])){
            $this->errors["pwd3"]= "Please include at least one capital letter in your password";
        }
        if (!preg_match("#[a-z]+#", $this->data['pwd'])){
            $this->errors["pwd4"]= "Please include at least one lowercase letter in your password";
        }
        return;
    }
    private function confirmPassword(){
        if($this->data['pwd']!==$this->data['confirm-pwd'])
            $this->errors["pwd5"]= "Password confirmation doesn't match.";
    }



}
?>