<?php 
include 'dbconn.php';
include 'tutor_head.php';
include 'links.php';

$tutor_course_id = $_GET['tutor_course_id'];

$conn->begin_transaction();

try {
    $sql1 = "DELETE FROM course_exam_questions WHERE tutor_course_id = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("i", $tutor_course_id);
    $stmt1->execute();

    $sql2 = "DELETE FROM section_videos WHERE course_section_id IN (
                 SELECT course_section_id FROM course_sections WHERE tutor_course_id = ?
             )";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $tutor_course_id);
    $stmt2->execute();

    $sql3 = "DELETE FROM course_sections WHERE tutor_course_id = ?";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bind_param("i", $tutor_course_id);
    $stmt3->execute();

    $sql4 = "DELETE FROM student_answers WHERE course_enrollment_id IN (
                 SELECT course_enrollment_id FROM course_enrollments WHERE tutor_course_id = ?
             )";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->bind_param("i", $tutor_course_id);
    $stmt4->execute();

    $sql5 = "DELETE FROM course_enrollments WHERE tutor_course_id = ?";
    $stmt5 = $conn->prepare($sql5);
    $stmt5->bind_param("i", $tutor_course_id);
    $stmt5->execute();

    $sql6 = "DELETE FROM tutor_courses WHERE tutor_course_id = ?";
    $stmt6 = $conn->prepare($sql6);
    $stmt6->bind_param("i", $tutor_course_id);
    $stmt6->execute();

    $conn->commit();
    header("Location: tutor_courses.php");

} catch (Exception $e) {
    $conn->rollback();
    header("Location: msg.php?msg=Something Went Wrong&class=text-danger");
}

$stmt1->close();
$stmt2->close();
$stmt3->close();
$stmt4->close();
$stmt5->close();
$stmt6->close();
$conn->close();
?>