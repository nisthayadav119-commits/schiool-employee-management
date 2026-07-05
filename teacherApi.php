<?php

    include('../layouts/session.php');
    header('Content-Type: application/json'); 


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'allTeachers') {

        $school = $conn->prepare("SELECT * FROM `teachers`");
        $school->execute();
        $techers = $school->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'getTeachers') {

        $school = $conn->prepare("SELECT * FROM `teachers` WHERE id = ?");
        $school->execute([$_GET['id']]);
        $techers = $school->fetch(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'deleteTeacher') {

        $school = $conn->prepare("DELETE FROM `teachers` WHERE id = ?");
        $school->execute([$_GET['id']]);

        echo json_encode(['message' => 'success']);
    }

?>