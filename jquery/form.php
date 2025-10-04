<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
<body>
   <form action="" method="" id="form">
    <div>
         <label for="">Name</label>
          <input type="text" id="name">
    </div>
    <div>
         <label for="">Email</label>
          <input type="text" id="email">
    </div>
    <div>
         <label for="">city</label>
          <select name="" id="city">
             <option value="1">Dhaka</option>
             <option value="2">Rajshahi</option>
             <option value="3">Sylhet</option>
          </select>
    </div>
    
    <div>
        <label for="">Subject</label> <br>
         <label for="Bangla">
              <input id="Bangla" type="checkbox" name="subject" value="Bangla">Bangla
         </label>
         <label for="English">
              <input id="English" type="checkbox" name="subject" value="English">English
         </label>
         <label for="PHP">
              <input id="PHP" type="checkbox" name="subject" value="PHP">PHP
         </label>
    </div>
    <div>
         <label for="address">Address</label>
         <textarea name="address" id="address"></textarea>
    </div>
    <div>
          <button id="btn_submit" type="submit">Submit</button>
    </div>
    
   </form>
  
   <script src="jquery.js"></script>
   <script>
    
     $(function(){

       $("#form").on("submit", function(e){
          e.preventDefault();

          let name= $("#name").val();
          let email= $("#email").val();
          let city= $("#city").val();
          let city_name= $("#city").find("option:selected").text();
          let address= $("#address").val();

           let subjects=[];
           $("input[name=subject]:checked").each(function(){
             subjects.push($(this).val());
           });
          //  console.log(name, email, city, address, city_name,subjects.join(", "));

          $.ajax({
           url:"api_url.php",
           type:"GET",
           data:{username:name, userEmail:email, userCity:city, address:address, subjects:subjects},
           success:function(res){
              console.log(res); 
           },
           error:function(error){
             console.log(error); 
           }
          });
          




       });
     })
   </script>

</body>
</html>