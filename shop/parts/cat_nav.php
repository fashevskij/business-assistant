<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	 <a class="nav-link <?php if(!isset($_GET['id'])){ ?> active <?php } ?>" href="/shop/">Все</a>
	<?php
	$sql1 = "SELECT * FROM categories WHERE `status` = 'Добавлено'";
	$result1 = $conn->query($sql1);

	while ($row1 = mysqli_fetch_assoc($result1)) {
		if(isset($_GET['id']) && $_GET['id'] == $row1['id']) {
			echo "<a class='nav-link active' href='/shop/cat.php?id=" . $row1["id"] . "'>" . $row1["title"] . "</a>";
		} else {
			echo "<a class='nav-link' href='/shop/cat.php?id=" . $row1["id"] . "'>" . $row1["title"] . "</a>";
		}
	}
	?>
</div>