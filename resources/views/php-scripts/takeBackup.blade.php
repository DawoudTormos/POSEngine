<?php






    $lastBackupDateString = $lastBackup[0]->last_updated_at;
    $lastBackupDate = date_create($lastBackupDateString);

    //echo $newformat;

echo "<br><br>";




    $currentDate = new DateTime("Asia/Beirut");  


$DateAndTime1 = $currentDate->format("Y-m-d h:i:s");  
$DateAndTime2 = $lastBackupDate->format("Y-m-d h:i:s");  



echo $DateAndTime1."<br><br>";
echo $DateAndTime2."<br><br>";


$d1 = strtotime("$DateAndTime1");
$d2 = strtotime("$DateAndTime2");

$interval = $d1 - $d2;
$totalHoursDiff   = $interval/60/60;

 echo $totalHoursDiff."<br>" ;


if (abs($totalHoursDiff) > 3.2){
    echo "last backup was in more than 3 hours. A new backup will be created.";
    system('php "C:/xampp/htdocs/Laravel Project 1/Laravel_project_1/artisan" backup:run --only-db"');


 $query = "Update global_variables set last_updated_at =  '".$currentDate->format("Y-m-d h:i:s")."' WHERE name = 'lastBackup'";
mysqli_query( $DB , $query);

echo "<br>";




}else{
     echo "last backup was in less than 3 hours.";
    
}

 /* echo "<br><br><br>".$interval->format('%s');

 echo "<br><br><br>".$interval->format('%i');

 echo "<br><br><br>".$interval->format('%h');

 echo "<br><br><br>".$interval->format('%m');*/


//echo $interval;
//system('php "C:/xampp/htdocs/Laravel Project 1/Laravel_project_1/artisan" backup:run --only-db"'); 


?>