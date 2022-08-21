<?php
include ('database.php');

$obj=new query();
$selectCondition_Arr=array();
$insertCondition_Arr=array('Sender_Address'=>'test1 sender', 'Receiver_Address'=>'test1 receiver', 'Customer'=>'test1 customer', 'Equipment_Freight_Type'=>'test1 freight', 'Trailer_1'=>'test1 trailer1', 'Trailer_2'=>'test1 trailer2');
$deleteCondition_Arr=array('Id'=>'17');
$updateCondition_Arr=array('Sender_Address'=>'test2', 'Receiver_Address'=>'test2', 'Customer'=>'test2', 'Equipment_Freight_Type'=>'test2', 'Trailer_1'=>'test2', 'Trailer_2'=>'test2');

//$result=$obj->getData('*','consignments',$selectCondition_Arr,'Id','DESC','',);


//$result=$obj->insertData('consignments',$insertCondition_Arr);


//$result=$obj->deleteData('consignments',$deleteCondition_Arr);


//$result=$obj->updateData('consignments',$updateCondition_Arr,'Id','17');