<?php
namespace cs174assignments\hw3\src\models;
class Model
{
    //get policy data from database and return it as an array with policy title
    public function getPolicyData($policyTitle)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "insurance";
        $policyData = array();
        // Create connection
        $conn = new \mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM policy WHERE title = '$policyTitle'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $policyData[] = $row;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        return $policyData;
    }

}