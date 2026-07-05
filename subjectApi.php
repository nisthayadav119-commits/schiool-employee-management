<?php

    include('../layouts/session.php');
    header('Content-Type: application/json'); 


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'allSubjects') {

        $school = $conn->prepare("SELECT * FROM `subjects`");
        $school->execute();
        $techers = $school->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'getSubjects') {

        $school = $conn->prepare("SELECT * FROM `subjects` WHERE id = ?");
        $school->execute([$_GET['id']]);
        $techers = $school->fetch(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'deleteSubjects') {

        $school = $conn->prepare("DELETE FROM `subjects` WHERE id = ?");
        $school->execute([$_GET['id']]);

        echo json_encode(['message' => 'success']);
    }

?>