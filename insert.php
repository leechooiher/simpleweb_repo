<?php
                //establish your connection to database server
                $connectionInfo = array("UID" => "apuadmin", "pwd" => "Apu@123456", "Database" => "simpleweb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
                $serverName = "tcp:simplewebtp000001.database.windows.net,1433";
                $conn = sqlsrv_connect($serverName, $connectionInfo);
                if (!$conn)
                {
                        die("Error connection: ".sqlsrv_errors());
                }

                $sql= "INSERT INTO restaurant (restaurant_name, restaurant_address, restaurant_phone) VALUES (?, ?, ?);";
                $params = array("7 Eleven", "Bukit Jalil", "03-12345123");
                $getResults= sqlsrv_query($conn, $sql, $params);

                if ($getResults == FALSE)
                {
                    die(print_r( sqlsrv_errors(), true));
                }               
                echo "<script>alert('Data Inserted!');</script>";
                echo "<script>window.location.href='viewtable.php';</script>";
?>