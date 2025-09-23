<div class="p-4">
<a class="btn btn-success" href="users">Manage User</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>User Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$user->id</td></tr>";
		$html.="<tr><th>Name</th><td>$user->name</td></tr>";
		$html.="<tr><th>Role Id</th><td>$user->role_id</td></tr>";
		$html.="<tr><th>Password</th><td>$user->password</td></tr>";
		$html.="<tr><th>Email</th><td>$user->email</td></tr>";
		$html.="<tr><th>Full Name</th><td>$user->full_name</td></tr>";
		$html.="<tr><th>Created At</th><td>$user->created_at</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$user->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Verify Code</th><td>$user->verify_code</td></tr>";
		$html.="<tr><th>Inactive</th><td>$user->inactive</td></tr>";
		$html.="<tr><th>Mobile</th><td>$user->mobile</td></tr>";
		$html.="<tr><th>Updated At</th><td>$user->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
