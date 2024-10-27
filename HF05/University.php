<?php

include "AbstractUniversity.php";

class University extends AbstractUniversity
{
    public $subjects = [];

    /**
     * @inheritDoc
     */
    public function addSubject(string $code, string $name): Subject
    {

        if (!$this->isSubjectExists($code)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception('Subject already exists!');
        }
    }

    public function deleteSubject(Subject $subject): void
    {
        foreach ($this->subjects as $subject_in) {
            if ($subject->getCode() == $subject_in->getCode()) {
                if ($subject->getStudents()->count() == 0) {
                    $this->subjects->remove($subject);
                } else {
                    throw new Exception('Subject not empty!');
                }
            } else {
                throw new Exception('Subject not exists!');
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getStudentNumber(), $student->getName());
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getStudentsForSubject(string $subjectCode)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            $total += $subject->getNumberOfStudents();
        }
        return $total;
    }

    public function isSubjectExists(string $subjectCode): bool
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $subjectCode) {
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function print()
    {
        foreach ($this->subjects as $subject) {
            print("Subject: " . $subject . "<br>");
            print(str_repeat("-", 25) . "<br>");
            $subject->getStudents();
        }
    }
}