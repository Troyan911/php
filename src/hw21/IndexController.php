<?php

class IndexController
{
    /**
     * @return void
     */
    public function greeting(): void
    {
        echo "Greeting!<br>";
        echo "Hello on {$_SERVER["HTTP_HOST"]} from {$_SERVER["HTTP_USER_AGENT"]}";
    }

    /**
     * @return void
     */
    public function calculate(): void
    {

        $firstNumber = intval($_POST["firstNumber"]);
        $secondNumber = intval($_POST["secondNumber"]);

//        $firstNumber = $this->validateInt($_POST["firstNumber"]);
//        $secondNumber = $this->validateInt($_POST["secondNumber"]);
        echo "Result of adding $firstNumber and $secondNumber is " . $firstNumber + $secondNumber;
    }

    public function update(): void
    {
        echo "Method: put";
    }

    public function delete(): void
    {
        echo "Method: delete";
    }

    private function validateInt(string $value) {
        //todo
        return var_filter($value, FILTER_VALIDATE_INT);
    }
}