<script src="js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<footer>
	<div align="center" class="container">
		<hr>
		<div>
			Copyright © 2020. Create & Design by Chanotai Krajeam.
		</div>
		<?php if (isset($_SESSION['username'])) {?>
			<div>
				<a href="product.php" style="color: black; text-decoration: none;">Home</a>
				<a href="logout.php" style="color: black; text-decoration: none;">Logout</a>
			</div>
		<?php } ?>
	</div><br>
</footer>
</body>
</html>