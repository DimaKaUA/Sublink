<form action="/<?php echo $redirecting_link ?>" name="forma" method="POST">
	<ul>
		<li>
			<label for="password">Enter the password:</label>
			<input type="password" name="password">
			<span> <?php echo $error; ?> </span>
		</li>
	</ul>	
</form>