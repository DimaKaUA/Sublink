<html>
<head>
	<title>Lumen</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel='stylesheet' href='/css/bootstrap.min.css' type='text/css' media='all'>
	<script src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel='stylesheet' href='/css/style.css' type='text/css' media='all'>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
<div class="container">
<div class="row">
	<div class="col-sm-2" >
	</div>
	<div class="col-sm-8" >
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
			<a href="/" class="navbar-brand">Hide link</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href=""></a></li>
				<li><a href=""></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php  if(isset($users_links)) : ?>
				<li>
					<a href="/user/sign_out">Sign out</a>
				</li>
			<?php else : ?>
				<li>
					<a href="/user/sign_up">Sign up</a>
				</li>
				<li>
					<a href="/user/sign_in">Sign in</a>
				</li>
			<?php endif ?>
				<li>
					<a href="/user/profile">
						My profile
						<span class="label label-success">online</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-sm-2" >
	</div>
</div>
</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-2" >
		</div>
		<div class="col-sm-8" >
	        <?php require_once $page; ?>
		</div>
		<div class="col-sm-2" >
		</div>
	</div>
</div>
<br>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-2" >
			</div>
			<div class="col-sm-8" >
				<p>
					<a href="/user/profile">My profile</a>
					·
					<a href="/user/sign_out">Sign out</a>
				</p>
			</div>
			<div class="col-sm-2" >
			</div>
		</div>
	</div>
</div>
</body>
</html>