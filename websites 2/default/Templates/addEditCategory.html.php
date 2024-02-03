	<section class="right">

<form action="" method="post">

		<input type="hidden" name="category[id]" value="<?php if ($category) echo $category['id']; ?>"  />

		<label for="category[name]">Type in the  name category Name</label>
		<input type="text" name="category[name]" value="<?php if ($category) echo $category['name']; ?>" />

		<input type="submit" value="Add">
		<input type="submit" name="submit" value="Log Out">
</form>
</main>
