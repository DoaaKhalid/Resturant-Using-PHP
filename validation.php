<?php 
class validation{


    protected $objToValidate;
    private $validationErrors=[];
    private $defaultErrorMsg;
    public $valid=True;

    // types of  validators:
    const REQUIRED = 1;
    const UNIQUE = 2;
    const INT = 3;
    const EMAIL = 4;
    const NUMBER = 5;
    const POSITIVE_NUMBER = 6;
    const MAXNUM=7;
    const PHONE_NUMBER=8;

    public function __construct() {
        $this->defaultErrorMsg = array(
            self::REQUIRED => "This field is required ",
            self::UNIQUE => "This value is already in use",
            self::INT => "Positive integer value is required",
            self::EMAIL => "Invalid e-mail address format",
            self::NUMBER => "Number is required",
            self::POSITIVE_NUMBER => "Positive number is required",
        );
    }

    /**
      Validate single field value with one of the predefined validators.
     */
   public function ValidateType($fieldName, $type, $message = null, $params = null) {
        // validation checks using regular expressions and other methods
       switch ($type)
       {
           case $type==self::REQUIRED:
               if(strlen($fieldName)==0){
                  $message="This field is required ";
                   $this->addError($fieldName,$message);
               }
               break;
           case $type==self::EMAIL:
               if(!filter_var($fieldName,FILTER_VALIDATE_EMAIL)){
                   $message="Invalid e-mail address format";
                   $this->addError($fieldName,$message);}
               break;
           case $type==self::NUMBER:
               if(!is_numeric($fieldName)){
                   $message="It Should be Number";
                   $this->addError($fieldName,$message);}
               break;
           case $type==self::POSITIVE_NUMBER:
               if($fieldName<0){
                   $message="Positive number is required";
                   $this->addError($fieldName,$message);}
               break;
           case $type==self::MAXNUM:
               if($fieldName>$params){
                   $message="Sorry We have Only ". "$params" . " From this Meal .";
                   $this->addError($fieldName,$message);}
               break;
           case $type==self::PHONE_NUMBER:
               if(!preg_match('/^[0-9]{11}$/', $fieldName)) {                   $message="Invalid Number!";
                   $this->addError($fieldName,$message);
               }
               break;

           default:
               break;

       }
    }

    /**
     * Add error to this object (to $this->validationErrors).
     * Used for manually validating what can't be validated
     * using the predefined validators.
     *
     * @param $fieldName string
     * @param $message string Error message to be displayed
     */
    private function addError($fieldName, $message) {
        $this->valid=false;
        if(!isset($this->validationErrors["$fieldName"]))
        $this->validationErrors["$fieldName"]=$message;
    }

    /**
     * Get validation errors for all fields that didn't pass validation.
     * The result is an array where keys are field names and values are
     * validation messages.
     *
     * @return array|NULL
     */
    public function getValidationErrors() {

        return $this->validationErrors;
    }
}
