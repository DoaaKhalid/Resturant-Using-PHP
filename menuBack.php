<?php
$errors=[];
$AllValid=true;
$go="#";
$totalPrice=0;

require ('validation.php');
require('Database.php');

if(isset($_POST['order'])) {
    $db = new Database();
    $db->IsConnected();
    $Meals = [];
    if ($db->IsConnected()) {
        $db->Query("SELECT * From `meals`");
        $db->Execute();
        $Meals = $db->resultset();
        foreach ($Meals as $meal):
            foreach ($_POST as $query_string_variable => $value) :{
                if (strpos($query_string_variable, $meal->name) === 0 && $value !='0' && $value != 'Order ') {

                    $valid = new validation();
                    $valid->ValidateType($value, validation::NUMBER);
                    $valid->ValidateType($value, validation::POSITIVE_NUMBER);
                    if($value>0)
                    $valid->ValidateType($value, validation::MAXNUM, '', $meal->numberOfItems);

                    $Errors = $valid->getValidationErrors();
                    if (!$valid->valid) {
                        $AllValid = false;
                        array_push($errors, array("$query_string_variable", $Errors["$value"]));
                    }

                }
            }
            endforeach;
            endforeach;
    }

if($AllValid==true)
{
    $AllValid=false;
    $Pill=[];
    require ('Orders.php');
    $order=new Orders();
    $db=new Database();
    $db1=new Database();
    $db1->Query("DELETE FROM `pill`  ");
    $db1->Execute();

    foreach ($Meals as $meal):
            foreach($_POST as $query_string_variable => $value) :{
                if(strpos($query_string_variable, $meal->name)===0 && $value>0){
                            $price = $order->orderMeal($meal->name,(double)$value );
                            $totalPrice+=$price;
                    $db->Query("INSERT INTO `pill`( `name`, `number`, `price`) VALUES  (:name, :number, :price)");
                    $db->bind(':name',$meal->name);
                    $db->bind(':number',(int)$value);
                    $db->bind(':price',$price);

                    $db->Execute();
                        }
            }
            endforeach;
            endforeach ;

    ?>
    <script type="text/javascript">
        window.location.href = 'pill.php';
    </script>
    <?php
    }
}
