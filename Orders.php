<?php

class Orders{

    public $orderName="";
    public $orderPrice="";
    function __construct($orderName='',$orderPrice=0)
    {
        $this->orderName=$orderName;
        $this->orderPrice=$orderPrice;
    }
    function orderMeal($name,$num)
    {
        $db = new Database();
        $db->Query("SELECT `id`, `name`, `price`, `numberOfItems`, `img_dir`, `type` FROM `meals` WHERE `name`=:name");
        $db->bind(':name',$name);
        $db->Execute();
        $meal=($db->resultset());
        $numberOfItems=(double)$meal[0]->numberOfItems-(double)$num;
        $db->Query("UPDATE  `meals` SET  `numberOfItems`=:numberOfItems WHERE `name`=:name");
        $db->bind(':name',$name);
        $db->bind(':numberOfItems',$numberOfItems);
        $db->Execute();
        return $num*$meal[0]->price;
    }
}