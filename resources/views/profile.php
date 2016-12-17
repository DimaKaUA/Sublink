<?php  if(isset($users_links)) : ?>
	<?php if(isset($users_name)) echo "Hello, {$users_name}!"; ?>
	<?php if(isset($users_email)) echo "Your email: {$users_email}!"; ?>
	<div class="list-group">
		<?php   
			foreach ($users_links as $link) :
		?>
			<a href="<?php echo "{$link->hided_link}"; ?>" class="list-group-item list-group-item-action ">
				<h5 class="list-group-item-heading"><?php echo "{$link->hided_link}"; ?></h5>
				<p class="list-group-item-text"><?php echo "{$link->redirecting_link}"; ?></p>
				<p class="list-group-item-text"><?php if(isset($link->expiry_date)) echo "{$link->expiry_date}"; ?></p>
				</a>
			<?php endforeach ?>   
	</div>
	

	<input value="Back" onclick="location.href='/'" type="button" class="btn btn-default" />
	<input value="Sign out" onclick="location.href='/user/sign_out'" type="button" class="btn btn-warning" />
<?php endif ?>
