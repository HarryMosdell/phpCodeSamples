
<section class="right">

	<h2>Furniture</h2>

			<a class="new" href="addEditFurniture">Add new furniture</a>
      <a class="new" href="recyleBin1">Recyle Bin</a>
			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			foreach ($furnitureQuery as $furniture) {
				echo '<tr>';
				echo '<td>' . $furniture['name'] . '</td>';
				echo '<td>£' . $furniture['price'] . '</td>';
				echo '<td><a style="float: right" href="addEditFurniture?id=' . $furniture['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="deleteFurniture?id=' . $furniture['id'] . '">Delete</a></td>';
				echo '<td><form method="post" action="deleteFurniture">
				<input type="hidden" name="id" value="' . $furniture['id'] . '" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

?>
<form action="" method="POST" >
<input type="submit" name="submit" value="Log Out" />

</form>
	</section>
	</main>
