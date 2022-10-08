<?php include ('dbconnect.php'); ?>

<!DOCTYPE html>
<html>
  <head>
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Главная страница</title>
  </head>
  <body>
    
    <form method="post">
		<h2>Заполнить таблицу</h2>
		<p class="hint-text">Заполните форму</p>

		<div class="form-group">
			<div class="row">
				<div class="row"><input type="text" class="form-control" name="fname" required="true" placeholder="Имя"></div>

				<div class="row"><input type="text" class="form-control" name="ftaskdesc" required="true" placeholder="Описание"></div>

				<div class="row"><input type="text" class="form-control" name="lname" required="true" placeholder="Фамилия"></div>
			</div>
		</div>
		<div class="form-group"><input type="text" name="contact" placeholder="Номер мобильного" required="true" maxlength="10" pattern="[0-9]+"></div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Enter your Email id" required="true">
 		</div>
		<div class="form-group">
			<textarea class="form-control" name="address" placeholder="Enter Your Address" required="true"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
		</div>
	</form>
  </body>
</html>

