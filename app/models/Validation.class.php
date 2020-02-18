<?php 

/**
 * Validation - обработчик ошибок при авторизации
 *
 *
 * @link      https://github.com/Zakirzhan/php-course-firstapp/blob/master/app/models/Validation.class.php
 * @author    Zakirzhan
 * @copyright 2020
 */


/**
/**
 * Class Validation
 */
/**
 * @method $this fieldIsEmpty()
 * @method $this validateEmail()
 * @method $this usernameExists()
 * @method $this emailExists()
 * @method $this redirectUser()
 */


class Validation
{   
    //pdo
    protected $db = '';

    function __construct($mydb){
        $this->db = $mydb;
    }
    private $emailValidationRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+/';


    /**
     * Field is Empty - check
     *
     * @param string|$field
     *
     * @return boolean
     */
    public function fieldIsEmpty(?string $field)
    {
        return empty($field);
    }


    /**
     * Validate Email 
     *
     * @param string|$email
     *
     * @return boolean
     */

    public function validateEmail(?string $email)
    {
        return preg_match($this->emailValidationRegex, $email);
    } 

    /**
     * Email Exists 
     *
     * @param string|$email
     *
     * @return boolean
     */

    public function emailExists(?string $email)
    {
        if (!empty($this->db->getItem('users',['email'=>$email])))
        {
            return true;
        }

        return false;
    }
     /**
     * Redirect User 
     *
     * @param boolean|$validUser - if true go main page or redirect to error page
     * @param int|$codeError 1 - "Email and password combination is incorrect!"
     *                       2 - "Email is not found in our database!"
     *                       3 - "Email is not valid!"
                             4 - "Email is exists in our DB!"
     *
     * @return NULL
     */

    public function redirectUser($validUser, ?string $method = 'authorize', ?int $codeError = 1)
    {
        if (!$validUser || !empty($codeError))
        {   
            header('Location: '.APP_BASE_URL.'account/'.$method.'/error/'.$codeError);

        }
        else
        {
           header('Location: '.APP_BASE_URL);
        }
        die();
    }

    /**
     * Login Validation 
     *
     * @param string|$email
     * @param string|$password
     *
     * @return NULL
     */
    public function loginValidation(?string $email, ?string $password)
    {
        $validUser = false;

        //проверяем 
        if (!$this->fieldIsEmpty($email) && !$this->fieldIsEmpty($password))
        {
            $user = null;

            if ($this->validateEmail($email))
            {

                    $user = $this->db->getItem('users',['email'=>$email]);
               
            } else {
                 $this->redirectUser(0,3);
            }

            if (!empty($user))
            {

                if (md5($password) == $user['password'])
                {   
                    Session::set('user',$user);
                    $validUser = true;
                }
            }  else {

                  $this->redirectUser(0,2);

            }
        }

        $this->redirectUser($validUser);
    }

    /**
     * Registration Validation 
     *
     * @param string|$email
     * @param string|$password
     *
     * @return NULL
     */
    public function registrationValidation(?string $email, ?string $password)
    {
        $validUser = false;

        //проверяем 
        if (!$this->fieldIsEmpty($email) && !$this->fieldIsEmpty($password))
        { 

            if ($this->validateEmail($email))
            {

                    if(!$this->emailExists($email)){
                   
                        $user = array('email' => $email, 'password' => $password);

                        $this->db->insertItem('users',$user); 

                        Session::set('user',$user);
 

                    } else {

                         $this->redirectUser(0,'registration',4);
                    }
               
            } else {

                 $this->redirectUser(0,'registration',3);
            }
 
        }

    }

}


 ?>