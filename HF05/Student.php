<?php

class Student
{
    private int $studentNumber;
    private string $name;
    private array $grades;

    /**
     * @param int $studentNumber
     * @param string $name
     */
    public function __construct(int $studentNumber, string $name)
    {
        $this->studentNumber = $studentNumber;
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name . ' - ' .  $this->studentNumber;
    }

    public function getStudentNumber(): int
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(int $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function addGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = ($grade);
    }

    public function getAvgGrades(): float
    {
        return round(array_sum($this->grades) / count($this->grades), 2);
    }


    public function printGrades(): void
    {
        foreach ($this->grades as $subjectCode => $grade) {
            echo "$subjectCode - $grade<br>";
        }
    }

}