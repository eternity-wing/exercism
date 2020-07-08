<?php

class School
{
    private $students = [];

    public function add(string $student, int $grade): void
    {
        if (!isset($this->students[$grade])) {
            $this->students[$grade] = [];
        }
        $this->students[$grade][] = $student;
        sort($this->students[$grade]);
    }
    public function grade(int $grade): array
    {
        return  $this->students[$grade] ?? [];
    }
    public function studentsByGradeAlphabetical(): array
    {
        ksort($this->students);
        return $this->students;
    }
}
