<?php
namespace Broadcasting;


trait ConstantTrait
{
    /**
     * @return array
     */
    static function getConstants() {
        $reflect = new \ReflectionClass(__CLASS__);
        return collect($reflect->getConstants());
    }

}