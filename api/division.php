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
  <option value="">Choose Your Districts</option>
</select>
</div>

<script>
let division= document.getElementById("division");
let districts= document.getElementById("districts");

division.addEventListener("change", function(e){
 let id = division.value;
//  let form = new FormData();
//  form.append("division_id",id);

 fetch("districts.php", {
   method:"POST",
   body:JSON.stringify({id:id})
 })
.then(res => res.json() )
.then(data =>{
    let html="";
    data.forEach(element => {
      html+= `<option value="${element.id}">${element.name}</option>`;
    });
    districts.innerHTML=  html;
})
.catch(err => console.log(err));
});

</script>


</body>
</html>