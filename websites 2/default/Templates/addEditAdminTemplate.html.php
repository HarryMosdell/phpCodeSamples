	<section class="right">

<form action="" method="post">

		<input type="hidden" name="users[id]" value="<?php if ($users) echo $users['id']; ?>"  />

		<label>Enter Full Name</label>
		<input type="text" name="users[name]" value="<?php if ($users) echo $users['name']; ?>"/>

		<label>UserName</label>
		<input type="text" name="users[username]" value="<?php if ($users) echo $users['username']; ?>"  />

		<label>Password</label>
		<input type="text" name="users[password]" value="<?php if ($users) echo $users['password']; ?>"  />


		<input type="submit" name="addEdit" value="Add Admin">
		<input type="submit" name="submit" value="Logout">
</form>
</main>
