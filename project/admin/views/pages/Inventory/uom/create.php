
<?php
//    print_r($uom);
?>



<form action="<?= $base_url?>/uom/save" method="POST">
   
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input  type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="create" value="create" class="btn btn-primary">Submit</button>
</form>