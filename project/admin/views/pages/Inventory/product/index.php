<?php
//  var_dump($data);
//  var_dump($product);
//  var_dump($bag);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">OfferPrice</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $html="";
        foreach ($data as $row) {
          $html.= "
                <tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['offer_price']}</td>
                <td>
                 
                <a class=\"btn btn-info\" href='$base_url/product/edit/{$row['id']}'>Edit</a>
                <a class=\"btn btn-danger\" href='$base_url/product/delete/{$row['id']}'>Delete</a>
                
                </td>
                
                </tr>
          ";
        }

        echo $html;
    ?>
  
    
  </tbody>
</table>