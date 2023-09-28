<?php
declare(strict_types=1);
class ParentClass {

    private $text = "some text";

    /**
     * @return string
     */
    public function getText() : string {
        return ucfirst($this->text) . PHP_EOL;
    }

    /**
     * @param string $value
     * @return void
     */
    public function printText(string $value) {
        echo $value;
    }
}