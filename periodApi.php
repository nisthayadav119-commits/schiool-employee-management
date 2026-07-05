<?php

    include('../layouts/session.php');
    header('Content-Type: application/json'); 


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'allPeriod') {

        $school = $conn->prepare("SELECT * FROM `period`");
        $school->execute();
        $techers = $school->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'getPeriod') {

        $school = $conn->prepare("SELECT * FROM `period` WHERE id = ?");
        $school->execute([$_GET['id']]);
        $techers = $school->fetch(PDO::FETCH_ASSOC);

        echo json_encode($techers);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['type'] == 'deletePeriod') {

        $school = $conn->prepare("DELETE FROM `period` WHERE id = ?");
        $school->execute([$_GET['id']]);

        echo json_encode(['message' => 'success']);
    }

?>