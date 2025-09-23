<?php
if(isset($_POST["btnEdit"])){
	$role_id=$_POST["txtId"];
	$obj=Role::get_role($role_id);
}
if(isset($_POST["btnUpdate"])){
	$role_id=$_POST["txtId"];
		$name=$_POST["txtName"];

	$obj=new Role($role_id,$name);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-role' method='post'><div class='card-header'>
				<a href='manage-role' class='btn btn-success'>Manage Role</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->