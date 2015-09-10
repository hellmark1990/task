<?php

namespace app\models;

class UsersModel extends Model {

    protected $username;
    protected $email;
    protected $password;
    protected $repeatPassword;

    public function __construct() {
        parent::__construct();
    }

    public function rules() {
        return [
            ['username' => 'min[2]|max[255]|trim'],
            ['email' => 'min[4]|max[255]|trim|email'],
            ['password' => 'min[6]|max[255]|trim'],
            ['repeatPassword' => 'min[6]|max[255]|trim|same_as[password]'],
        ];
    }

    public function setUsername($username) {
        $this->username = $username ? $username : '';
    }

    public function getUsername() {
        return $this->username;
    }

    public function setEmail($email) {
        $this->email = $email ? $email : '';
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password ? $password : '';
    }

    public function getPassword() {
        return $this->password;
    }

    public function setRepeatPassword($repeatPassword) {
        $this->repeatPassword = $repeatPassword ? $repeatPassword : '';
    }

    public function getRepeatPassword() {
        return $this->repeatPassword;
    }
}