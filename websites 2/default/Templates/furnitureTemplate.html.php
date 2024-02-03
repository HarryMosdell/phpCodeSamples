<main class="admin">

	<section class="left">

	<?php
	foreach ($category as $cat) {
	echo	'<li>'.'<a href="ViewSelectedCategory?id='.$cat['id'].'">'.$cat['name'].'</a>'.'</li>';

	}
  ?>

	</section>

	<section class="right">

		<h1>Furniture</h1>

	<ul class="furniture">

	<?php

	foreach ($furnitureQuery as $furniture) {

$category = $categoryTable->find('id', $furniture['categoryId'])[0];

		echo '<li>';

		if (file_exists('images/furniture/' . $furniture['id'] . '.jpg')) {
			echo '<a href="images/furniture/' . $furniture['id'] . '.jpg"><img src="images/furniture/' . $furniture['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
	


		echo '<h2>' . $furniture['name'] . '</h2>';
		echo '<h3>' . $category['name'] . '</h3>';
		echo '<p>' . $furniture['state'] . '</p>';
		echo '<p>' . $furniture['description'] . '</p>';
			echo '<h4>£' . $furniture['price'] . '</h4>';
		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
</main>
