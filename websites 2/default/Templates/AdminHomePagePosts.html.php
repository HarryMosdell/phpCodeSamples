
			<h2>Add Post To The User Homepage</h2>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="homePagePosts[id]"  />
				<label>Title</label>
				<input type="text" name="homePagePosts[title]"  />

				<label>Post Content</label>
				<textarea name="homePagePosts[content]" ></textarea>

				<?php

					if (file_exists('../images/furniture/' . $homePagePost['id'] . '.jpg')) {
						echo '<img style="width: 200px; clear: both" src="../images/furniture/' . $homePagePost['id'] . '.jpg" />';
					}
				?>
				<label>post image</label>

				<input type="file" name="image" />

				<input type="submit" name="submit" value="add post" />
	<input type="submit" name="logout" value="Log Out" />
			</form>

</section>
	</main>
