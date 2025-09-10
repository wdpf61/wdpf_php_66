/*
=========================================
   SQL JOIN TYPES - Notes & Examples
=========================================

JOINS are used to combine rows from two or more tables
based on a related column between them.

We will assume two sample tables:

TABLE: students
+----+----------+-----------+
| id | name     | class_id  |
+----+----------+-----------+
| 1  | Alice    | 101       |
| 2  | Bob      | 102       |
| 3  | Charlie  | 103       |
| 4  | David    | NULL      |
+----+----------+-----------+

TABLE: classes
+-----------+------------+
| class_id  | class_name |
+-----------+------------+
| 101       | Math       |
| 102       | Science    |
| 104       | English    |
+-----------+------------+

-----------------------------------------
1) INNER JOIN
-----------------------------------------
Returns rows where there is a match in BOTH tables.

Use case: Get students who are assigned to a class.

*/
SELECT s.id, s.name, c.class_name
FROM students s
INNER JOIN classes c ON s.class_id = c.class_id;
/*
Result:
+----+--------+-----------+
| id | name   | class_name|
+----+--------+-----------+
| 1  | Alice  | Math      |
| 2  | Bob    | Science   |
+----+--------+-----------+
*/


/*
-----------------------------------------
2) LEFT JOIN (LEFT OUTER JOIN)
-----------------------------------------
Returns ALL rows from LEFT table, and matching rows from RIGHT.
If no match, NULL is shown.

Use case: List ALL students, with their class if assigned.
*/
SELECT s.id, s.name, c.class_name
FROM students s
LEFT JOIN classes c ON s.class_id = c.class_id;
/*
Result:
+----+---------+-----------+
| id | name    | class_name|
+----+---------+-----------+
| 1  | Alice   | Math      |
| 2  | Bob     | Science   |
| 3  | Charlie | NULL      |
| 4  | David   | NULL      |
+----+---------+-----------+
*/


/*
-----------------------------------------
3) RIGHT JOIN (RIGHT OUTER JOIN)
-----------------------------------------
Returns ALL rows from RIGHT table, and matching rows from LEFT.
If no match, NULL is shown.

Use case: Show ALL classes, with students if available.
*/
SELECT s.id, s.name, c.class_name
FROM students s
RIGHT JOIN classes c ON s.class_id = c.class_id;
/*
Result:
+------+--------+-----------+
| id   | name   | class_name|
+------+--------+-----------+
| 1    | Alice  | Math      |
| 2    | Bob    | Science   |
| NULL | NULL   | English   |
+------+--------+-----------+
*/


/*
-----------------------------------------
4) FULL OUTER JOIN
-----------------------------------------
Returns ALL rows from BOTH tables.
If no match, NULL is shown for missing side.

⚠ Not supported in MySQL directly (use UNION of LEFT + RIGHT).
Supported in PostgreSQL, SQL Server, Oracle.

Use case: Show ALL students and ALL classes, matched where possible.
*/
-- PostgreSQL/SQL Server syntax:
SELECT s.id, s.name, c.class_name
FROM students s
FULL OUTER JOIN classes c ON s.class_id = c.class_id;

-- MySQL workaround:
SELECT s.id, s.name, c.class_name
FROM students s
LEFT JOIN classes c ON s.class_id = c.class_id
UNION
SELECT s.id, s.name, c.class_name
FROM students s
RIGHT JOIN classes c ON s.class_id = c.class_id;


/*
-----------------------------------------
5) CROSS JOIN
-----------------------------------------
Returns Cartesian product (all combinations).

Use case: Assign every student to every class (not usually practical).
*/
SELECT s.id, s.name, c.class_name
FROM students s
CROSS JOIN classes c;
/*
If 4 students × 3 classes = 12 rows
*/


/*
-----------------------------------------
6) SELF JOIN
-----------------------------------------
A table joins with itself.

Use case: Find students in the same class.
*/
SELECT a.name AS student1, b.name AS student2, a.class_id
FROM students a
JOIN students b ON a.class_id = b.class_id
WHERE a.id < b.id;
/*
Result:
+----------+----------+-----------+
| student1 | student2 | class_id  |
+----------+----------+-----------+
| Alice    | Bob      | 101       |
... etc.
*/


/*
-----------------------------------------
7) NATURAL JOIN (if supported)
-----------------------------------------
Automatically joins tables by columns with the same name.

⚠ Be careful, may cause unexpected results if extra same-named columns exist.

Use case: Quick join when column names match.
*/
SELECT * 
FROM students
NATURAL JOIN classes;


/*
=========================================
SUMMARY OF USE CASES
=========================================

INNER JOIN  -> When you only need matching rows.
LEFT JOIN   -> When you need ALL from left (students list even if no class).
RIGHT JOIN  -> When you need ALL from right (class list even if no students).
FULL JOIN   -> When you need ALL from both.
CROSS JOIN  -> When you need all combinations.
SELF JOIN   -> When comparing rows within the same table.
NATURAL JOIN-> Shortcut join when column names match.

=========================================
*/
