<?php
require_once "AbstractUniversity.php";
require_once "Subject.php";

class University extends AbstractUniversity
{
    // TODO Implement all the methods declared in parent
    public function addSubject(string $name, string $code): Subject
    {
        if (!$this->isSubjectExists($code, $name)) {
            $subject = new Subject($name, $code);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception(message:"Subject exists!") ;
        }
    }

    // ToDo
    private function isSubjectExists(string $code, string $name): bool
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $code && $subject->getName() == $name) {
                return true;
            }
        }
        return false;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    public function getStudentsForSubject(string $subjectCode): array
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $student) {
                $total++;
            }
        }
        return $total;

    }

    public function print():void
    {
        foreach ($this->subjects as $subject){
            echo '-----------------------' . "<br>";
            echo $subject."<br>";
            echo '------------------------' . "<br>";

            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . "-". $student->getStudentNumber();
                echo "<br>";
            }
        }
    }

    public function deleteSubject(Subject $subject): void
    {
        $subjectCode = $subject->getCode();
        $hasStudents = false;

        foreach ($this->subjects as $existingSubject) {
            if ($existingSubject->getCode() === $subjectCode) {
                $students = $existingSubject->getStudents();
                if (!empty($students)) {
                    $hasStudents = true;
                    break;
                }
            }
        }

        if ($hasStudents) {
            throw new Exception("The course cannot be deleted.");
        }

        $this->subjects = array_filter($this->subjects, function ($existingSubject) use ($subjectCode) {
            return $existingSubject->getCode() !== $subjectCode;
        });
    }

}
