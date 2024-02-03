
<main class="home">

		<p>Welcome to Fran's Furniture. We're a family run furniture shop based in Northampton. We stock a wide variety of modern and antique furniture including laps, bookcases, beds and sofas.</p>

	<ul class="furniture">
		<?php

		foreach ($homePageQuery as $homePagePost) {

			echo '<li>';

			if (file_exists('images/homePagePostsPictures/' . $homePagePost['id'] . '.jpg')) {
				echo '<a href="images/homePagePostsPictures/' . $homePagePost['id'] . '.jpg"><img src="images/homePagePostsPictures/' . $homePagePost['id'] . '.jpg" /></a>';
			}

			echo '<div class="details">';
			echo '<h2>' . $homePagePost['title'] . '</h2>';
		  echo '<h3>' . $homePagePost['content'] . '</h3>';
			echo '<h4>' . $homePagePost['Postdate'] . '</h4>';


			echo '</div>';
			echo '</li>';
		}

		?>



	</main>
</ul >
