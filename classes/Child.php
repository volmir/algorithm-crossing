<?php

class Child extends People
{
    /**
     * 
     * @param string $name
     */
    public function __construct($name = '') 
    {
        parent::__construct($name);
    }
}
