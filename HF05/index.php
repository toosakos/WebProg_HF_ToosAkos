<?php

include "loader.php";

$uni = new University();

// Create multiple students
$students = [
    new Student(1, "John"),
    new Student(2, "Pete"),
    new Student(3, "Lane"),
    new Student(4, "Mary"),
    new Student(5, "Cole"),
    new Student(6, "Alice"),
    new Student(7, "Bob")
];

// Add subjects to the university
$sub1 = $uni->addSubject("pyt", "Python");
$sub2 = $uni->addSubject("jvs", "JavaScript");
$sub3 = $uni->addSubject("php", "PHP");

try {
    // Enroll students in subjects
    $uni->addStudentOnSubject($sub1->getCode(), $students[2]); // Lane
    $uni->addStudentOnSubject($sub1->getCode(), $students[3]); // Mary
    $uni->addStudentOnSubject($sub1->getCode(), $students[4]); // Cole
    $uni->addStudentOnSubject($sub2->getCode(), $students[0]); // John
    $uni->addStudentOnSubject($sub2->getCode(), $students[1]); // Pete
    $uni->addStudentOnSubject($sub2->getCode(), $students[2]); // Lane
    $uni->addStudentOnSubject($sub2->getCode(), $students[3]); // Mary
    $uni->addStudentOnSubject($sub2->getCode(), $students[4]); // Cole
    $uni->addStudentOnSubject($sub3->getCode(), $students[5]); // Alice
    $uni->addStudentOnSubject($sub3->getCode(), $students[6]); // Bob

    // Assign random grades for testing purposes
    foreach ($students as $student) {
        $student->addGrade($sub1,rand(60, 100)); // Random grade between 60 and 100
        $student->addGrade($sub2,rand(60, 100)); // Add a second random grade
        $student->addGrade($sub3,rand(60, 100)); // Add a second random grade
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

// Print all students for each subject
echo "<h3>Students per Subject:</h3>";
echo "Python: " . implode(", ", $uni->getStudentsForSubject($sub1->getCode())) . "<br>";
echo "JavaScript: " . implode(", ", $uni->getStudentsForSubject($sub2->getCode())) . "<br>";
echo "PHP: " . implode(", ", $uni->getStudentsForSubject($sub3->getCode())) . "<br>";

// Create an array of all students
echo "<h3>All Students Ranked by Average Grades:</h3>";

// Sort students by their average grades in descending order
usort($students, function($a, $b) {
    return $b->getAvgGrades() <=> $a->getAvgGrades();
});

// Print sorted students
foreach ($students as $student) {
    echo $student->getName() . " - Average Grade: " . $student->getAvgGrades() . "<br>";
}

?>
