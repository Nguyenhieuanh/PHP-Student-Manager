<?php


namespace model\scores;


class Score
{
    protected $scoreId;
    protected $factor1;
    protected $factor2;
    protected $factor3;
    protected $studentId;
    protected $subjectId;

    public function __construct()
    {
    }

    /**
     * @param mixed $scoreId
     */
    public function setScoreId($scoreId)
    {
        $this->scoreId = $scoreId;
    }

    /**
     * @param mixed $factor1
     */
    public function setFactor1($factor1)
    {
        $this->factor1 = $factor1;
    }

    /**
     * @param mixed $factor2
     */
    public function setFactor2($factor2)
    {
        $this->factor2 = $factor2;
    }

    /**
     * @param mixed $factor3
     */
    public function setFactor3($factor3)
    {
        $this->factor3 = $factor3;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @param mixed $subjectId
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @return mixed
     */
    public function getFactor1()
    {
        return $this->factor1;
    }

    /**
     * @return mixed
     */
    public function getFactor2()
    {
        return $this->factor2;
    }

    /**
     * @return mixed
     */
    public function getFactor3()
    {
        return $this->factor3;
    }

    /**
     * @return mixed
     */
    public function getScoreId()
    {
        return $this->scoreId;
    }

    /**
     * @return mixed
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

}