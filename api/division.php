<?php
include_once "db_config.php";
$stmt= $db->query("select * from divisions");
$data= $stmt->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
<div>
    <h1>All divisions</h1>
<select name="division" id="division">
 <?php
     foreach ($data as $value) {
       echo "<option value='{$value['id']}'>{$value['name']}</option>";
     }
 ?>
 <option value=""></option>
</select>
</div>

<div>
<h1>All Districts</h1>
<select name="districts" id="districts">

</select>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

let division= document.getElementById("division");
let districts= document.getElementById("districts");

division.addEventListener("change", function(e){
let id = division.value;

console.log(id);

$.ajax({
  type: "POST",
  url: "districts.php",
  data: {division_id:id},
  success: function(data){
    let parseData=JSON.parse(data);
     console.log(parseData);

     let html="";
     parseData.forEach(element => {
        html+= `<option value='${element.id}'>${element.name}</option>`;
     });

    districts.innerHTML=html;
  }
});




});






})
</script>


</body>
</html>