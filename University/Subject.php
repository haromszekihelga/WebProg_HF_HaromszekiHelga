<?php

include_once "Student.php";

/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    private string  $code;
    private string $name;
    private array $students;


    // TODO Generate getters and setters

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents(array $students): void
    {
        $this->students = $students;
    }

    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    public function __construct(string $code, string $name, array $student=[])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students=$student;
    }

    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
        if (!$this->isStudentExists($studentNumber)) {
            $student = new Student($name, $studentNumber);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Student exists!") ;
        }
    }

    // ToDo
    private function isStudentExists(string $studentNumber): bool
    {
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function __toString() :string 
    {
        return $this->getCode() . '-' . $this->getName() . "\n";
    }

    public function deleteStudent(Student $student): bool{
        {
            $studentKey = array_search($student, $this->students, true);
    
            if ($studentKey !== false) {
                unset($this->students[$studentKey]);
                $this->students = array_values($this->students);
    
                return true;
            }
    
            return false;
        }
    }
}
