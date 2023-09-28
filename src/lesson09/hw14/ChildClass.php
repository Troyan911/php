<?php
declare(strict_types=1);

class ChildClass extends ParentClass {
    /**
     * @return void
     */
    public function print(): void {
        echo strtoupper($this->text) . PHP_EOL;
    }
}