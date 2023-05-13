<?php
include_once("./db/connection.php");
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$arr = [];
$data = [];
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { {
            $arr["question"] = $row["question"];
            $arr["answer"] = $row["answer"];
            $arr["incorrect_answers"] = $row["incorrect_answers"];
            $arr["difficulty"] = $row["difficulty"];
            $arr["type"] = $row["type"];
            array_push($data, json_encode($arr, true));
        }
        // echo " question " . $row["question"] . " answer: " . $row["answer"] . " incorrect_answers: " . $row["incorrect_answers"] . " difficulty " . $row["difficulty"] . " type" . $row["type"] . "<br>";
    }
    echo $data;
} else {
    echo "0 results";
}
$conn->close();
