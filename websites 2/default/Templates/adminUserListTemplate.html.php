
<section class="right">

	<?php

	//	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>
	<h2>Admin Users</h2>
<a class="new" href="addEditAdminUser"> Add new admin User</a>
			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 10%">UserName</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			foreach ($adminTable as $admin) {
				echo '<tr>';
				echo '<td>' . $admin['name'] . '</td>';
				echo '<td>' . $admin['username'] . '</td>';
				echo '<td><a style="float: right" href="addEditAdminUser?id=' . $admin['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="deleteAdminUser?id=' . $admin['id'] . '">Delete</a></td>';
				echo '<td><form method="post" action="deleteFurniture">
				<input type="hidden" name="id" value="' . $admin['id'] . '" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';
//}
?>
	</section>
	</main>
