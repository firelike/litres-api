<?php
namespace Firelike\LitRes\Response\Person;


use Firelike\LitRes\Response\AbstractResponse;

class Author extends AbstractResponse
{

    protected $firstName;

    protected $middleName;

    protected $lastName;

    protected $id;


    public function toArray()
    {
        return array(
            'firstName' => $this->getFirstName(),
            'middleName' => $this->getMiddleName(),
            'lastName' => $this->getLastName(),
            'id' => $this->getId()
        );
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
     * @return $id
     */
    public function getId()
    {
        return $this->id;
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
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}