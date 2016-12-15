<form action="/user/sign_in" name="formaL" method="POST" role="form">
<div class="form-group">
	<label for="email">Your email:</label>
	<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" class="form-control" placeholder="Enter your email">
	<p class="help-block"> <?php if(isset($message_email)) echo $message_email; ?> </p>
</div>
<div class="form-group">
	<label for="password">Your password:</label>
	<input type="password" name="password" class="form-control" id="pass" placeholder="Your password">
	<p class="help-block"> <?php if(isset($message_password)) echo $message_password; ?> </p>
</div>
<div class="form-group">
	<button class="btn btn-primary" type="submit">Sign in</button>
	<input value="Back" onclick="location.href='/'" type="button" class="btn btn-default" />
</div>	
</form>