<?php
namespace Firelike\LitRes\Response;


class Person extends AbstractResponse
{

    protected $title;

    protected $level;

    protected $artsCount;

    protected $firstName;

    protected $middleName;

    protected $lastName;

    protected $inverseFullName;

    protected $textDescrHtml;

    protected $photo;

    protected $recensesCount;


    public function toArray()
    {
        return array(
            'title' => $this->getTitle(),
            'level' => $this->getLevel(),
            'artsCount' => $this->getArtsCount(),
            'firstName' => $this->getFirstName(),
            'middleName' => $this->getMiddleName(),
            'lastName' => $this->getLastName(),
            'inverseFullName' => $this->getInverseFullName(),
            'textDescrHtml' => $this->getTextDescrHtml(),
            'photo' => $this->getPhoto(),
            'recensesCount' => $this->getRecensesCount()
        );
    }


    /**
     *
     * @return $title
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     *
     * @return $level
     */
    public function getLevel()
    {
        return $this->level;
    }


    /**
     *
     * @return $artsCount
     */
    public function getArtsCount()
    {
        return $this->artsCount;
    }


    /**
     *
     * @return $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }


    /**
     *
     * @return $middleName
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }


    /**
     *
     * @return $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    /**
     *
     * @return $inverseFullName
     */
    public function getInverseFullName()
    {
        return $this->inverseFullName;
    }


    /**
     *
     * @return $textDescrHtml
     */
    public function getTextDescrHtml()
    {
        return $this->textDescrHtml;
    }


    /**
     *
     * @return $photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }


    /**
     *
     * @return $recensesCount
     */
    public function getRecensesCount()
    {
        return $this->recensesCount;
    }


    /**
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     *
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }


    /**
     *
     * @param $artsCount
     */
    public function setArtsCount($artsCount)
    {
        $this->artsCount = $artsCount;
    }


    /**
     *
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    /**
     *
     * @param $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }


    /**
     *
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    /**
     *
     * @param $inverseFullName
     */
    public function setInverseFullName($inverseFullName)
    {
        $this->inverseFullName = $inverseFullName;
    }


    /**
     *
     * @param $textDescrHtml
     */
    public function setTextDescrHtml($textDescrHtml)
    {
        $this->textDescrHtml = $textDescrHtml;
    }


    /**
     *
     * @param $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


    /**
     *
     * @param $recensesCount
     */
    public function setRecensesCount($recensesCount)
    {
        $this->recensesCount = $recensesCount;
    }
}