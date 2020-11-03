<?php

$name=$email=$subject=$message='';

 //Form Information
   isset($_POST['yourName'])?$name = $_POST['yourName']:$name='';
   isset($_POST['yourEmail'])?$email= $_POST['yourEmail']:$email='';
   isset($_POST['yourSubject'])?$subject= $_POST['yourSubject']:$subject='';
   isset($_POST['yourMessage'])?$message= $_POST['yourMessage']:$message='';


   // Validation Errors
$nameError=$emailError=$subjectError=$messageError='';
require ('validation.php');

if(isset($_POST['sub'])) {
    $valid=new validation();
//Check Name Validation
    $valid->ValidateType($name, validation::REQUIRED);
//Check Email Validation
    $valid->ValidateType($email, validation::REQUIRED);
    $valid->ValidateType($email, validation::EMAIL);
//Check Subject Validation
    $valid->ValidateType($subject, validation::REQUIRED);

//Check Message Validation
    $valid->ValidateType($message, validation::REQUIRED);

    $Errors = $valid->getValidationErrors();

    //Errors
    isset($Errors["$name"])? $nameError=$Errors["$name"]:$nameError='';
    isset($Errors["$email"])? $emailError = $Errors["$email"]:$emailError ='';
    isset($Errors["$subject"])? $subjectError = $Errors["$subject"]:$subjectError='';
    isset($Errors["$message"])? $messageError=$Errors["$message"]:$messageError='';

    //If all Information is validate Insert it in Database
if($valid->valid)
{
    $_POST=array();
    require('Database.php');
        $db=new Database();
    $db->Query("INSERT INTO `contactpage`( `name`, `email`, `subject`, `message`) VALUES (:name,:email,:subject,:message)");
    $db->bind(':name',$name);
    $db->bind(':email',$email);
    $db->bind(':subject',$subject);
    $db->bind(':message',$message);
    $db->Execute();
    $db->alert("Your Message Sent .. Thank You ");



}
    }
