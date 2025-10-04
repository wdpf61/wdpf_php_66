
<?php
//    print_r($uom);
?>



<form action="<?= $base_url?>/uom/update" method="POST">
    <input type="hidden" name="id" value="<?= $uom->id?>">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input value="<?= $uom->name?>" type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="update" value="update" class="btn btn-primary">Submit</button>
</form>