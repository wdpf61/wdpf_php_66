<form action="<?= $base_url?>/product/save"   method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Offer Price</label>
    <input name="offer_price" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="btn_save" value="submit"  class="btn btn-primary">Submit</button>
</form>