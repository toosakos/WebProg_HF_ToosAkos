<?php

namespace HF04;

class ArrayManipulator
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function &__get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        $null = null;
        return $null;
    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }

    public function __unset(string $name): void
    {
        if (array_key_exists($name, $this->data)) {
            unset($this->data[$name]);
        }
    }

    public function __toString(): string
    {
        $string = '';
        foreach ($this->data as $name => $value) {
            if (is_array($value)) {
                $string .= "$name => " . json_encode($value) . " | ";
            } elseif (is_object($value)) {
                $string .= "$name => Object | ";
            } else {
                $string .= "$name => $value | ";
            }
        }
        return $string;
    }

    public function __clone(): void
    {
        foreach ($this->data as $key => $value) {
            if (is_object($value)) {
                $this->data[$key] = clone $value;
            } else {
                $this->data[$key] = $value;
            }
        }
    }
}
