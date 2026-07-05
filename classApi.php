<?php

    include('../layouts/session.php');
    header('Content-Type: application/json'); 


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'allClass') {

        $school = $conn->prepare("SELECT * FROM `class_list`");
        $school->execute();
        $techers = $school->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'getClass') {

        $school = $conn->prepare("SELECT * FROM `class_list` WHERE id = ?");
        $school->execute([$_GET['id']]);
        $techers = $school->fetch(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'deleteClass') {

        $school = $conn->prepare("DELETE FROM `class_list` WHERE id = ?");
        $school->execute([$_GET['id']]);

        echo json_encode(['message' => 'success']);
    }

?>