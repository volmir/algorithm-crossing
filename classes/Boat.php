<?php

class Boat 
{
    
    /**
     *
     * @var string
     */
    public $capasity = 'два ребенка или один взрослый';
  
    /**
     * 
     * @return string
     */
    public function getСapasity() 
    {
        return $this->capasity;
    }
}
