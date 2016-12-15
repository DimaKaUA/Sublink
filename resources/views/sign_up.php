<form action="/user/sign_up" name="formaR" method="POST" role="form">
<div class="form-group">
	<label for="name">Your name:</label>
	<input type="text" name="name" value="<?php if(isset($name)) echo $name; ?>" class="form-control" placeholder="Enter your name">
	<p class="help-block"> <?php if(isset($message_name)) echo $message_name; ?> </p>
</div>
<div class="form-group">
	<label for="email">Your email:</label>
	<input type="text" size="20" name="email" value="<?php if(isset($email)) echo $email; ?>" class="form-control" placeholder="Enter your email">
	<p class="help-block"> <?php if(isset($message_email)) echo $message_email; ?> </p>
</div>
<div class="form-group">
	<label for="password">Password:</label>
	<input type="password" name="password" class="form-control" id="pass" placeholder="Password">
	<p class="help-block"> <?php if(isset($message_password)) echo $message_password; ?> </p>
</div>
<div class="form-group">
	<button class="btn btn-primary" type="submit">Sign up</button>
	<input value="Back" onclick="location.href='/'" type="button" class="btn btn-default" />
</div>
</form>