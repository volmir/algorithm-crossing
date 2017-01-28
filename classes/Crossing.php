<?php

class Crossing
{

    /**
     *
     * @var array
     */
    public $adult;
    /**
     *
     * @var array
     */
    public $child;
    /**
     *
     * @var array
     */
    public $childOtherSide;    
    /**
     *
     * @var array
     */
    public $adultOtherSide;    
    /**
     *
     * @var Logger
     */
    public $logger;
    /**
     *
     * @var Boat
     */
    public $boat;
    /**
     *
     * @var River
     */
    public $river;

    public function setPeople(People $people)
    {
        if ($people instanceof Adult || $people instanceof Fisherman) {
            $this->adult[] = $people;
        }
        if ($people instanceof Child) {
            $this->child[] = $people;
        }
    }

    public function init(Logger $logger, Boat $boat, River $river)
    {
        $this->logger = $logger;
        $this->boat = $boat;
        $this->river = $river;
    }

    public function run()
    {
        $this->showTaskDescription();
        $this->startCrossing();
        while (count($this->child) > 1) {
            $this->moveChildOtherSide();
            if (count($this->adult) > 0 || count($this->child) > 0) {
                $this->returnBoat();
            }
        }
        while (count($this->adult) > 0) {
            $this->moveAdultOtherSide();
            $this->returnBoat();
            $this->moveChildOtherSide();
            if (count($this->adult) > 0 || count($this->child) > 0) {
                $this->returnBoat();
            }            
        }
        $this->finishCrossing();
    }
    
    protected function showTaskDescription()
    {
        $this->logger->log('Нужно написать алгоритм решения следующей задачи:');
        $this->logger->log('«Семья - Отец, мать и двое детей – сын и дочь, должны переправиться через реку.');
        $this->logger->log('Поблизости случился рыбак, который мог бы одолжить им свою лодку.');
        $this->logger->log('Однако, в лодке могут поместится только один взрослый или двое детей.');
        $this->logger->log('Как семье переправиться через реку и вернуть рыбаку его лодку?»');
        $this->logger->log('');
        $this->logger->log('Условия:');
        $this->logger->log(' - каждый член семьи должен быть классом с определенными свойствами.');
        $this->logger->log(' - сообщения о доставке должны писаться в log-файл так, чтоб было понятно, кто кого на какой берег перевез. '); 
        $this->logger->log(' - программа должна поддерживать расширяемость, к примеру, если захотим добавить еще детей.');
        $this->logger->log('');
        $this->logger->log('-------------------------------------------------------------------');
        $this->logger->log('');
    }

    protected function startCrossing()
    {
        $this->logger->log('Решение задачи:');
        $this->logger->log('Мы находимся на берегу реки ' . $this->river->getName());
        $this->logger->log('Вместимость нашей лодки составляет ' . $this->boat->getСapasity());
        $this->logger->log('Требуется перевезти всех взрослых и детей, и вернуть лодку рыбаку');
        $this->logger->log('На этом берегу находится ' . count($this->adult) . ' взрослых и ' . count($this->child) . ' детей');
        if (count($this->child) < 2) {
            $this->logger->log('При данных стартовых условиях у задачи нет решения');
        }
        $this->logger->log('Начинаем переправу');
    }

    protected function finishCrossing()
    {
        $this->logger->log('На этом берегу находится ' . count($this->adult) . ' взрослых и ' . count($this->child) . ' детей');
        $this->logger->log('Переправа завершена');
    }

    protected function moveAdultOtherSide()
    {
        $adult = array_shift($this->adult);
        $people_type = 'взрослый';
        if ($adult instanceof Fisherman) {
            $people_type = 'рыбак';
        }
        $this->logger->log('На другой берег переправился ' . $people_type . ' ' . $adult->getName());
        $this->adultOtherSide[] = $adult;
    }

    protected function moveChildOtherSide()
    {
        $child_1 = array_shift($this->child);
        $child_2 = array_shift($this->child);
        $this->logger->log('На другой берег переправился ребенок ' . $child_1->getName() . ' и ребенок ' . $child_2->getName());
        $this->childOtherSide[] = $child_1;
        $this->childOtherSide[] = $child_2;
    }

    protected function returnBoat()
    {
        $child = array_shift($this->childOtherSide);
        $this->logger->log('Ребенок ' . $child->getName() . ' вернул лодку назад');
        $this->child[] = $child;
    }

}
