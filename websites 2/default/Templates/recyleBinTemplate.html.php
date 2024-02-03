<section class="right">

	<h2>Furniture</h2>

			<a class="new" href="addEditFurniture">Add new furniture</a>
      <a class="new" href="recyleBin">Recylebin</a>
			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			foreach ($recyleBinQuery as $recyle) {
				echo '<tr>';
				echo '<td>' . $recyle['name'] . '</td>';
				echo '<td>£' . $recyle['price'] . '</td>';
				echo '<td><a style="float: right" href="restoreFurniture?id=' . $recyle['id'] . '">Restore</a></td>';
				echo '<td><a style="float: right" href="deleteFurniturePermantly?id=' . $recyle['id'] . '">Delete</a></td>';
				echo '<td><form method="post" action="deleteFurniture">
				<input type="hidden" name="id" value="' . $recyle['id'] . '" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';
//}
?>
	</section>
	</main>
