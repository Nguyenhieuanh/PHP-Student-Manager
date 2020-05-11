<?php


namespace model\klassen;


class Klasse
{
    protected $classId;
    protected $className;

    public function __construct($classId, $className)
    {
        $this->classId = $classId;
        $this->className = $className;
    }

    /**
     * @param mixed $classId
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

}