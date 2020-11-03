<?php

$name=$email=$phone=$time=$date=$person='';

//Form Information
isset($_POST['yourName'])?$name = $_POST['yourName']:$name='';
isset($_POST['yourEmail'])?$email= $_POST['yourEmail']:$email='';

isset($_POST['yourPhone'])?$phone = $_POST['yourPhone']:$phone='';
isset($_POST['Date'])?$date= $_POST['Date']:$date='';
isset($_POST['Time'])?$time = $_POST['Time']:$time='';
isset($_POST['Persons'])?$person= $_POST['Persons']:$person='';


// Validation Errors
$nameError=$emailError=$subjectError=$messageError=$phoneError=$dateError=$timeError=$personError='';
require ('validation.php');

if(isset($_POST['reservation'])) {

        $valid = new validation();


//Check Name Validation
    $valid->ValidateType($name, validation::REQUIRED);

    //Check Email Validation
    $valid->ValidateType($email, validation::REQUIRED);
    $valid->ValidateType($email, validation::EMAIL);

    //Check Phone
    $valid->ValidateType($phone, validation::REQUIRED);
    $valid->ValidateType($phone, validation::PHONE_NUMBER);

    //Check Date
    $valid->ValidateType($date, validation::REQUIRED);

    //Check Time
    $valid->ValidateType($time, validation::REQUIRED);

    //Check Persons
    $valid->ValidateType($person, validation::REQUIRED);



    $Errors = $valid->getValidationErrors();

    //Errors
    isset($Errors["$name"])? $nameError=$Errors["$name"]:$nameError='';
    isset($Errors["$email"])? $emailError = $Errors["$email"]:$emailError ='';
    isset($Errors["$phone"])? $phoneError = $Errors["$phone"]:$phoneError ='';
    isset($Errors["$date"])? $dateError = $Errors["$date"]:$dateError ='';
    isset($Errors["$time"])? $timeError = $Errors["$time"]:$timeError ='';
    isset($Errors["$person"])? $personError = $Errors["$person"]:$personError ='';

    //If all Information is validate Insert it in Database
  if($valid->valid)
    {
        if(isset($_POST['reservation'])) {

            require('Database.php');
            $db=new Database();
            $db->Query("SELECT *  FROM  `table`");
            $db->Execute();
            $tabels=$db->resultset();
            foreach ($tabels as $tabel):
                {
                if($tabel->name==$person)
                {
                    if($tabel->number>0)
                    {
                        $db->Query("INSERT INTO `reservation`( `name`, `email`, `date`, `phone`, `time`, `persons`) VALUES  (:name, :email, :date, :phone, :time, :persons)");
                        $db->bind(':name',$name);
                        $db->bind(':email',$email);
                        $db->bind(':date',$date);
                        $db->bind(':phone',$phone);
                        $db->bind(':time',$time);
                        $db->bind(':persons',$person);
                        $db->Execute();
                        $name=$tabel->name;
                        $number = $tabel->number -1;
                        $db->Query("UPDATE  `table` SET  `number`=:number WHERE `name`=:name");

                        $db->bind(':number',$number);
                        $db->bind(':name',$name);
                        $db->Execute();
          $db->alert('We do a Reservation for you Thank You ');

                    }
                }
                }
                endforeach;

        }
        $_POST=array();


    }
}
