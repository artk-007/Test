	<?php
include('incudes/dp.php');
 
 $date =date("Y-m-d",strtotime(date(Y).'-'.date(n).'-'.$_GET['date']));
 $date_next = date('Y-m-d', strtotime("+1 day", strtotime($date)));
 
?>
	<html>
	<head>
	<title>Расписание Экзаменов</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div class="block ml-5 mr-5 mt-5">
		<table class="calendar__tb w-75 ">
			<tr class="calendar__row">
				<th class="calendar__head">Время экзамена</th>
				<th class="calendar__head">Название предмета</th>
				<th class="calendar__head">Список специальностей, абитуриенты которых должны прийти на экзамен</th>
			</tr>
			<?php 
				$res = mysqli_query($connection, "SELECT SQL_CALC_FOUND_ROWS sch.date, sub.title, spec.code FROM schedule AS sch 
																	INNER JOIN subjects AS sub ON sch.id_subject = sub.id
																		INNER JOIN subjects_to_specialitie AS ky ON  sub.id = ky.id_subject
																			INNER JOIN specialities AS spec ON ky.id_speciality = spec.id
																				WHERE sch.date BETWEEN '$date' AND '$date_next'
																					ORDER BY sch.date ASC
																					LIMIT 0, 10");
				$sub_t = 'NULL';
				while ($ex = mysqli_fetch_assoc($res))  
				{
					
					if($ex['title'] != $sub_t)
					{
						echo'</td>'.'</tr>';
						$sub_t =$ex['title'];
					echo '<td>'.date("H:i", strtotime($ex['date'])).'</td>';
					echo '<td>'.$ex['title'].'</td>';
					echo '<td>'.$ex['code'];
					}else{
					echo ' / '.$ex['code'];
					}
					

				}

			?>			
		</table>
		</div>
	</body>
