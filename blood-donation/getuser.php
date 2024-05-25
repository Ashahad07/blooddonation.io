<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #eda59d;
            padding: 25px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* #customers tr:hover {
            background-color: green;
        } */

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            border-radius: 2px;
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>

<body>

    <?php

    // Include the database connection file
    require "db_connection.php";

    // Get the value of the "q" parameter in the GET request
    $q = $_GET["q"];

    // Select all rows from the "donors" table where the "bloodgroup" column matches the value of the "q" parameter
    $sql = "SELECT * FROM donors WHERE bloodgroup = '" . $q . "'";

    // Execute the query and store the result
    $result = mysqli_query($con, $sql);

    // Output a heading and table element
    echo "<h2>Donors List</h2>";
    echo "<table id='customers'>
<tr>
<th>Name</th>
<th>Blood Group</th>
<th>Email Id</th>
<th>Mobile Number</th>
<th>City</th>
</tr>";

    // Fetch each row from the result as an associative array
    while ($row = mysqli_fetch_array($result)) {
        // Output a row in the table for each row in the result
        echo "<tr>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['bloodgroup'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td>" . $row['town'] . "</td>";
        echo "</tr>";
    }

    // Output the closing table tag
    echo "</table>";

    // Close the database connection
    mysqli_close($con);

    ?>

</body>

</html>