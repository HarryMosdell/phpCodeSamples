
<section class="right">

<?php
//if isset here sesssion
  ?>
    <h2>Categories</h2>

    <a class="new" href="addEditCategory">Add new category</a>

    <?php
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '</tr>';

    foreach ($categories as $category) {
      echo '<tr>';
      echo '<td>' . $category['name'] . '</td>';
      echo '<td><a style="float: right" href="addEditCategory?id=' . $category['id'] . '">Edit</a></td>';
      echo '<td><form method="post" action="deleteCategory">
      <input type="hidden" name="id" value="' . $category['id'] . '" />
      <input type="submit" name="submit" value="Delete" />
      </form></td>';
      echo '</tr>';
    }

    echo '</thead>';
    echo '</table>';
?>
    <form action="" method="POST" >
    <input type="submit" name="submit" value="Log Out" />
