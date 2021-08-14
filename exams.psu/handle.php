<?php
  
include('incudes/dp.php');
$subject = $_POST['subject'];
$date=  date("Y-m-d H:i:s",strtotime($_POST['date'].' '.$_POST['time'].':00'));

echo $date.'<hr>';
$id_subj = mysqli_query($connection, "SELECT `id`  FROM `subjects` WHERE `title` = '$subject'");
  $subj = mysqli_fetch_assoc($id_subj);
  $id =$subj['id'];
  echo $id.'<hr>';
 $result = mysqli_query($connection, "INSERT INTO `schedule`(`id_subject`, `date`) VALUES ('$id', '$date')");
 if ($result != false ) {
   echo "Успешно создана новая запись";
} else {
   echo "Ошибка: " . $result . "<br>" . $connection->error;
}

/*header("Location: index.php");*/
?> 


