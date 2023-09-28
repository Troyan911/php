<?php
declare(strict_types=1);
class ParentClass {
    protected $text = "some text";

    /**
     * @return void
     */
    public function print() : void {
        echo ucfirst($this->text) . PHP_EOL;
    }
}