<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<form action="/" name="forma" method="POST">
		<ul>
			<li>
				<label for="hided_link">Your link:</label>
				<input type="text" name="hided_link" value="<?php echo $hided_link; ?>">
				<span> <?php echo $message_link; ?> </span>
			</li>
			<li>
				<label for="expiry_date">Expiry date (format Y-m-d H:i:s):</label>
				<input type="text" size="20" name="expiry_date" value="<?php echo $expiry_date; ?>">
				<span> <?php echo $message_date; ?> </span>
			</li>
				<!-- <input type="button" value="Date" onClick="tData(forma);"> -->
			<li>
				<label for="password">Password:</label>
				<input type="password" name="password">
			</li>
			<li>
				<button class="submit" type="submit">Generate</button>
			</li>
		</ul>	
	</form>
</body>
</html>