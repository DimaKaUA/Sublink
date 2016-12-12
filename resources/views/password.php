<form action="/<?php echo $redirecting_link ?>" name="forma" method="POST">
<div class="form-group">
	<label for="password">Enter the password:</label>
	<input type="password" name="password" class="form-control" id="pass" placeholder="Enter the password">
	<p class="help-block"> <?php if(isset($error)) echo $error; ?> </p>
</div>
</form>