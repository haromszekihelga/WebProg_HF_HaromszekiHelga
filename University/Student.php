<?php

/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades = [];

    // TODO Generate constructor with both arguments.

    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }


    // TODO Generate getters and setters for both arguments

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function setGrade(Subject $subject, float $grade): void
    {
        $subjectCode = $subject->getCode();
        $this->grades[$subjectCode] = $grade;
    }

    public function getAvgGrade(): float
    {
        if (empty($this->grades)) {
            return 0.0;
        }

        $total = array_sum($this->grades);
        $count = count($this->grades);

        return $total / $count;
    }

    public function printGrades(): void
    {
        foreach ($this->grades as $subjectCode => $grade) {
            echo $subjectCode . " - " . $grade . "\n";
        }
    }
}
