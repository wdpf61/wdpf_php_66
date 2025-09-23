<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];
	$description=$_POST["txtDescription"];
	$created_at=$_POST["txtCreated_at"];

	$obj=new System_log("",$name,$description,$created_at);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create System_log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create System_log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-system_log' method='post'><div class='card-header'>
				<a href='manage-system-log' class='btn btn-success'>Manage System_log</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);
$html.=input_field(["label"=>"Description","name"=>"txtDescription"]);
$html.=input_field(["label"=>"Created_at","name"=>"txtCreated_at"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->