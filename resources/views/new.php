<form action="/" name="forma" method="POST" role="form">
<div class="form-group">
	<label for="hided_link">Your link:</label>
	<input type="text" name="hided_link" value="<?php if(isset($hided_link)) echo $hided_link; ?>" class="form-control" placeholder="Enter a link">
	<p class="help-block"> <?php if(isset($message_link)) echo $message_link; ?> </p>
</div>
<div class="form-group">
	<label for="expiry_date">Expiry date (format Y-m-d H:i:s):</label>
	<input type="text" size="20" name="expiry_date" value="<?php if(isset($expiry_date)) echo $expiry_date; ?>" class="form-control" placeholder="Enter an expiry date">
	<p class="help-block"> <?php if(isset($message_date)) echo $message_date; ?> </p>
</div>
<div class="form-group">
	<button type="button" value="Generate date" class="btn btn-default" onClick="tData(forma);"> Generate date </button>
</div>
<div class="form-group">
	<label for="password">Password:</label>
	<input type="password" name="password" class="form-control" id="pass" placeholder="Password">
	<p class="help-block"> <?php if(isset($message_password)) echo $message_password; ?> </p>
</div>
<div class="form-group">
	<button class="btn btn-primary" type="submit">Generate link</button>

<?php  if(isset($users_links)) : ?>
	<div class="dropdown">
 		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Stored links
	</button>
		<ul class="dropdown-menu">
			<?php   
	            foreach ($users_links as $link) {
			        echo "<li><a href='{$link->hided_link}'>{$link->hided_link}</a></li>";
			    }    
			?>
		</ul>
		
	</div>		
	<?php endif ?>
</div>
</form>
<div class="text-center" >
	<?php if(isset($redirecting_link)) : ?>
	<h1>Take your new link:</h1>
	<h2 class="text-success"><?php echo $redirecting_link; ?></h4>
	<?php endif ?>
</div>
