<?php
if(isset($_POST["btnDelete"])){
	$system_log_id=$_POST["txtId"];
	System_log::delete($system_log_id);
}

  

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage System_log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage System_log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
     
				<div class='card-body'>
		<?php
      $pg=isset($_GET["pg"])?$_GET["pg"]:1;
			echo System_log::manage_system_logs($pg,2);
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->