<?php
if(isset($_POST["btnEdit"])){
	$system_log_id=$_POST["txtId"];
	$obj=System_log::get_system_log($system_log_id);
}
if(isset($_POST["btnUpdate"])){
	$system_log_id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$description=$_POST["txtDescription"];
	$created_at=$_POST["txtCreated_at"];

	$obj=new System_log($system_log_id,$name,$description,$created_at);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-system_log' method='post'><div class='card-header'>
				<a href='manage-system_log' class='btn btn-success'>Manage System_log</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);
$html.=input_field(["label"=>"Description","name"=>"txtDescription","value"=>$obj->description]);
$html.=input_field(["label"=>"Created_at","name"=>"txtCreated_at","value"=>$obj->created_at]);

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