

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red{
             color: red;
        }
        .green{
             color: green;
        }
    </style>
</head>

<body>
   
       <h1 id="abc" class='green'></h1>
      

        <label for="m">Give The obtain mark</label> <br>
        <input type="text" name="number" id="number"><br> <br>

        <button type="submit" name="btn_submit">Submit</button>
 


    <script>

        let number = document.getElementById("number");
         
        number.addEventListener("keyup", function(){
             
           let result = null;
           let mark= this.value;
           if (mark >= 80 &&  mark <= 100) {
              result = "A+";
            } else if (mark >= 70 &&  mark < 80) {
                result = "A";
            } else if (mark >= 60 &&  mark < 70) {
                result = "A-";
            } else if (mark >= 50 &&  mark < 60) {
                result = "B";
            } else {
                result = "Fail";
            }

           document.getElementById("abc").innerText= "Result is"+ result;


        });



    </script>

</body>

</html>