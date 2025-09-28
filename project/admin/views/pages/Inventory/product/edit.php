<form action="<?= $base_url?>/product/update"   method="post">
    <input type="hidden" name="id" value="<?= $data['id']?? null  ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input value="<?= $data['name']?? null  ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price</label>
    <input value="<?= $data['price']?? null  ?>" type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Offer Price</label>
    <input value="<?= $data['offer_price']?? null  ?>" name="offer_price" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="btn_save" value="submit"  class="btn btn-primary">Submit</button>
</form>