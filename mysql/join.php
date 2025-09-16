<?php
  $db= new mysqli("localhost", "root", "", "batch66");
  $stmtInnerJoin= $db->query("SELECT users.name, roles.name as role from users JOIN roles on users.role_id= roles.id");
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
       <h1>INNER JOIN</h1>
         <table border="1">
            <?php
                while ($row =   $stmtInnerJoin->fetch_object()) {
                   echo "
                   <tr>
                <th>$row->name</th>
                <th>$row->role</th>
                 </tr>
        
                   ";
                }
            ?>
         </table>

     </div>
     <div>
       <h1>LEFT JOIN</h1>


     </div>
     <div>
       <h1>RIGHT JOIN</h1>


     </div>
     <div>
       <h1>FULL OUTER JOIN</h1>


     </div>


</body>
</html>



1. Basic SELECT

Show all columns of all students.

select * from students1;

Show only the name and age of all students.

select name , age from students1;

List all students from class 10.

select * from students1 where class= 10

Find all students whose age is greater than 20.

select * from students1 where age > 20

Show the first 10 students in the table.

select * from students1 limit 10 OFFSET 10

2. Filtering with WHERE

Find students whose name starts with 'S'.

select name from students1 where name like "S%";

Find students aged between 18 and 22.

select * from students1 where age between 18 and 22

Show students from class 9 or class 12.

select * from students1 where class=9 or class=12

List students whose email is NULL.

select * from students1 where email is NULL

Show students who are not 18 years old.

select * from students1 where age != 18

3. Sorting

List all students ordered by age ascending.

select * from students1 order by age asc

Show the oldest 5 students.

select * from students1 order by age desc limit 5

Show the youngest student in class 11.

select * from students1 where class=11 order by age asc limit 1

4. DISTINCT

Show all the different classes available in the table.

SELECT DISTINCT class FROM `students1`

Find all distinct ages present in the dataset.

SELECT DISTINCT class FROM `students1`


5. Aggregate Functions

Count how many students are in the table.
select count(*) total from students1;

Find the average age of all students.
select avg(age) as avg_age from studnets1

Find the maximum and minimum age.
select max(age) maxage, min(age) min_age from students1

Find the total sum of all ages.
select sum(age) from students1

Count how many students are in class 10.
select class,  count(*) from students1 where class=10

6. GROUP BY + HAVING

Show how many students are in each class.

select class,  count(*) total_student from students1 group by class

Show the average age of students grouped by class.

select class,  avg(age) avg_age from students1 group by class

Show only those classes where the number of students is greater than 20.

select class,  count(*) total_student from students1 group by class HAVING COUNT(*) > 15;

Find the youngest student’s age in each class.

select st1.name, st1.age , st1.class from students1 st1 
where age= 
(
    select min(age) from students1 st2 WHERE st1.class= st2.class
);


7. Subqueries

Find the names of students who have the maximum age in the table.

select * from students1 WHERE age = (select MAX(age) from students1);


Find students whose age is above the average age.

Find students who are in the same class as "Tanvir".

8. LIKE and Pattern Matching

Find all students whose name ends with a.

Find students whose email contains the word example.

select * from students1 WHERE email like "%example%";

Show all students whose name is 5 characters long.
select * from students1 WHERE length(name) = 5;
9. LIMIT & OFFSET

Show the top 5 students by age.

Show the next 5 students after skipping the first 5.

10. VIEW

Create a view named teen_students showing students aged between 13 and 19.

CREATE view teenage as
select * from students1 WHERE age BETWEEN 13 and 19;


Drop the teen_students view.