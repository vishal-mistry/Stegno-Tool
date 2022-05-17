<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 90%;
}

th{
  padding: 8px;
  text-align: center;
  border: 1px;
  background-color: #5C6BC0;
  color: white;
}

th{
  padding: 8px;
  text-align: left;
  border-bottom: 2.5px solid #ddd;
}
</style>
</head>
<body>
    <h2>Demonstration of stored procedure-</h2>
<h3>User Queries from About Us page - </h3>

<?php
 try {
 	$dbname ="envault"; //name of database
 	$username = "root";
 	$password = "bestofluck";
 	$host = "localhost:3306";
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL fetchall()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

?>
  <table>
    <tr>
                    <th><?php echo "Query id" ?></th>
                    <th><?php echo "Name" ?></th>
                    <th><?php echo "Email" ?></th>
                    <th><?php echo "Message" ?></th>
                    <th><?php echo "Time" ?></th>
    </tr>
 <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['qid'] ?></td>
                    <td><?php echo $r['name'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['message'] ?></td>
                    <td><?php echo $r['issued_at'] ?></td>
                </tr>
<?php endwhile; ?>
   </table>

</body>
</html>