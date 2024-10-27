<?php
class Subject
{
    private string $code;
    private string $name;
    private array $students = [];

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function addStudent(int $studentNumber, string $name): Student
    {
        if (!$this->isStudentExists($studentNumber)) {
            $student = new Student($studentNumber, $name);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Student already enrolled!");
        }
    }

    public function deleteStudent(String $studentName): void
    {
        foreach ($this->students as $student) {
            if ($student->getName() === $studentName) {
                $this->students->remove($student);
                echo "Student deleted!<br>";
            } else {
                throw new Exception("Student not enrolled!");
            }
        }
    }

    public function __toString(): string
    {
        return "$this->name, Code: $this->code";
    }

    public function getNumberOfStudents()
    {
        $total = 0;
        foreach ($this->students as $student) {
            $total += 1;
        }
        return $total;
    }

    public function isStudentExists(int $studentNumber): bool
    {
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                return true;
            }
        }
        return false;
    }
}