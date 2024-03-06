<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <h1>Data</h1>
 <?php
     $host = 'localhost';
     $dbname = 'datadell';
     $username = 'root';
     $password = '';

 try{
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $select=$pdo->prepare("SELECT * FROM user");
  $select->execute();
  $result= $select->fetchAll();
  echo "<table>";
  echo "<tr><th>UserName</th> <th>Email</th> <th>age</th> <th>tél</th></tr>";

 foreach($result as $row){
  echo "<tr>
   <td> {$row['UserName']} </td>
   <td> {$row['Email']} </td>
   <td> {$row['age']} </td>
   <td> {$row['tél']} </td>
   </tr> ";
 }
 
 }catch(PDOException $e) {
  $err = "Error: " . $e->getMessage();
}

$pdo = null;

 ?>
 <style>
  body {
  position: relative;
  background-color: white;
  background-repeat: no-repeat;
  height: 100vh;
  background-color:#F1F1F1;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
 </style>
</body>
</html>