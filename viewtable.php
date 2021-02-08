<html>
    <head>
        <title>List of KL Restaurant</title>
    </head>
    <body>
        <center>
        <h1>List of KL Restaurant</h1>
        <!--create table structure using HTML first-->
        <table border="1">
            <tr>
            <th>Restaurant ID</th>
            <th>Restaurant Name</th>
            <th>Address</th>
            <th>Phone</th>
            </tr>
            <tr>
            <td>0.5</td>
            <td>Mcd Restaurant</td>
            <td>Menara Standard Chartered, TPM</td>
            <td>03-22441234</td>
            </tr>
            <?php
                //establish your connection to database server
                $connectionInfo = array("UID" => "lch", "pwd" => "Admin0811", "Database" => "simplewebdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
                $serverName = "tcp:simplewebtp045992.database.windows.net,1433";
                $conn = sqlsrv_connect($serverName, $connectionInfo);
                if (!$conn) {
                    die("Error connection: ".sqlsrv_errors());
                } else {
                    echo "<script>alert('Success!');</script>";
                }

                $sql= "SELECT * FROM [dbo].[restaurant]";
                $getResults= sqlsrv_query($conn, $sql);

                if ($getResults == FALSE)
                {
                die("Error reading the database: ".sqlsrv_errors());
                }
                
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC))
                {
                echo "<tr>";
                echo "<td>". $row['restaurant_id'] . "</td>";
                echo "<td>". $row['restaurant_name'] ."</td>";
                echo "<td>". $row['restaurant_address'] . "</td>";
                echo "<td>". $row['restaurant_phone'] . "</td>";
                echo "</tr>";
                }
                sqlsrv_free_stmt($getResults);
            ?>
        </table>
        </center>
    </body>
</html>