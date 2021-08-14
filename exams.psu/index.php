<?php
include('incudes/dp.php');
include('incudes/calendar.php');

?>
<!DOCTYPE>
<html>
	<head>
	<title>Расписание Экзаменов</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	</head>
	<body>
	
	<div class="ml-5 mr-5">
		<div class="d-flex justify-content-sm-center text-uppercase p-5 display-1"><span><? echo date(d)?>_</span><span ><?echo date(F)?>_</span><span><?echo date(Y)?></span> </div>
		<?
			echo draw_calendar(date(n),date(Y));
		?>
	</div >
	<form method="POST" action="/handle.php">
		<div class="form-group w-75 ml-5 mt-5">
      		<label for="disabledSelect" >Выберите предмет</label>
      		<select name="subject" id="disabledSelect" class="form-control">
		    <?php
		    	$result = mysqli_query($connection, "SELECT * From `subjects`");
		    	while(($subj = mysqli_fetch_assoc($result)))
		    	{
					echo '<option >'.$subj['title'].'</option>';
				}
			?>
      		</select>
    	</div>
    	<div class="form-group ml-5 mr-5 mb-5">
	    		<input type="date" required name="date">
	    		<input type="time" name="time">
	    		<button type="submit" class="btn btn-primary ml-5">Добавить</button>
    	</div>
	</form>
	</body>
</html>	

<?php
mysqli_close($connection);	
?>