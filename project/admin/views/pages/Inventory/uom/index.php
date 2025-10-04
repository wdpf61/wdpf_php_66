<?php

//  print_r($uom);


?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
     <?php
        foreach ($uom as $value) {
           echo "
           
             <tr>
                <th >$value->id</th>
                <th >$value->name</th>


                <th class='btn-group'>
                 <a class='btn btn-info' href='$base_url/uom/edit/$value->id'>Eidt</a>
                 <a class='btn btn-danger' href='$base_url/uom/delete/$value->id'>Delete</a>
                
                </th>
                
            </tr>
           
           
           
           ";
        }
     ?>
  </tbody>
</table>