
			<h2>ADD EDIT Furniture</h2>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="furniture[id]" value="<?php if ($furniture) echo $furniture['id']; ?>"  />
				<label>Name</label>
				<input type="text" name="furniture[name]" value="<?php if ($furniture) echo $furniture['name']; ?>"  />


				<label>Description</label>
				<textarea name="furniture[description]" ><?php if ($furniture) echo $furniture['description']; ?></textarea>

				<label>Price</label>
				<input type="text" name="furniture[price]" value="<?php if ($furniture) echo $furniture['price']; ?>"/>

        <label for="furniture[state]"> Select Condition </label>
  <select name="furniture[state]">
   <option value="FirstHand"> First Hand  </option>
  <option value="SecondHand"> Second Hand </option>
 </select>


				<label>Category</label>
				<select name="furniture[categoryId]">
				<?php
					foreach ($categorys as $row) {
						if ($furniture['categoryId'] == $row['id']) {
							echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
						}
						else {
							echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
						}

					}

				?>

				</select>


				<?php

					if (file_exists('../images/furniture/' . $furniture['id'] . '.jpg')) {
						echo '<img style="width: 200px; clear: both" src="../images/furniture/' . $furniture['id'] . '.jpg" />';
					}
				?>
				<label>Product image</label>

				<input type="file" name="image" />

				<input type="submit" name="addEdit" value="Save Product" />
        <input type="submit" name="submit" value="Log Out" />
			</form>

</section>
	</main>
