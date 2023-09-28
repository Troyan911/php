<?php
declare(strict_types=1);

class ChildClass extends ParentClass {

    /**
     * @return string
     */
    public function getText(): string {
        return strtoupper(parent::getText());
    }
}