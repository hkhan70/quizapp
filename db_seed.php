<?php
include_once("./db/connection.php");
// Read the JSON file 
$json = file_get_contents('./json/questions.json');

// Decode the JSON file
$json_data = json_decode($json, true);

// Display data
foreach ($json_data as $data) {
    $type = $data["type"];
    $difficulty = $data["difficulty"];
    $question = $data["question"];
    $answer = $data["correct_answer"];
    $incorrect_answers = $data["incorrect_answers"];
    $incorrect_answers = json_encode($incorrect_answers, true);

    $sql = "INSERT INTO questions (question, answer, difficulty,question_type,incorrect_answers)
VALUES ('$question','$answer','$difficulty','$type','$incorrect_answers')";

    if ($conn->query($sql) === TRUE) {
        continue;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
