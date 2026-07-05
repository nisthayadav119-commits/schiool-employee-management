<?php

    include('../layouts/session.php');
    header('Content-Type: application/json'); 


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'allStudents') {

        $school = $conn->prepare("SELECT * FROM `students`");
        $school->execute();
        $techers = $school->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'getStudent') {

        $school = $conn->prepare("SELECT * FROM `students` WHERE id = ?");
        $school->execute([$_GET['id']]);
        $techers = $school->fetch(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'deleteStudent') {

        $school = $conn->prepare("DELETE FROM `students` WHERE id = ?");
        $school->execute([$_GET['id']]);

        echo json_encode(['message' => 'success']);
    }

?>