<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

//ToDo

$univ = new University();

$webProg = null;
$database = null;

try {
    $webProg = $univ->addSubject('101', 'Web programming');
    $database = $univ->addSubject('102', 'Database');
    //$database2 = $univ->addSubject('101', 'Database');
} catch (Exception $e) {
    echo $e->getMessage();
}

$webProg->addStudent('Nagy Lajos', '520');
$webProg->addStudent('Jakab Peter', '521');
$database->addStudent('Egy Elek', '522');
$database->addStudent('Ket Ella', '523');


$univ-> addSubject('103', 'Java programming');
$univ->addStudentOnSubject('103', new Student("524", "Harom Ella"));

$univ->print();
echo "Total number of students: " . $univ->getNumberOfStudents();

$students = $univ->getStudentsForSubject('101');
usort($students, function ($a, $b) {
    return $b->getAvgGrade() <=> $a->getAvgGrade();
});

echo "Students in the '101' course sorted by average grade.\n";
foreach ($students as $student) {
    echo $student->getName() . " - average grade: " . $student->getAvgGrade() . "\n";
}

print_r($univ->getStudentsForSubject("101"));