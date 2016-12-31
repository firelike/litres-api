<?php
namespace Firelike\LitRes\Request;


class Persons extends AbstractRequest
{

    /**
     * @var string
     */
    protected $person;

    /**
     * @var string
     */
    protected $searchPerson;

    /**
     * @var string
     */
    protected $searchLastName;

    /**
     * @var string
     */
    protected $rating;

    /**
     * @var string
     */
    protected $ratingPeriod;

    /**
     * @var string
     */
    protected $searchTypes;


    public function toArray()
    {
        return array_merge(parent::toArray(), array(
            'person' => $this->getPerson(),
            'search_person' => $this->getSearchPerson(),
            'search_last_name' => $this->getSearchLastName(),
            'rating' => $this->getRating(),
            'rating_period' => $this->getRatingPeriod(),
            'search_types' => $this->getSearchTypes()
        ));
    }

    /**
     * @return string
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param string $person
     * @return Persons
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchPerson()
    {
        return $this->searchPerson;
    }

    /**
     * @param string $searchPerson
     * @return Persons
     */
    public function setSearchPerson($searchPerson)
    {
        $this->searchPerson = $searchPerson;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchLastName()
    {
        return $this->searchLastName;
    }

    /**
     * @param string $searchLastName
     * @return Persons
     */
    public function setSearchLastName($searchLastName)
    {
        $this->searchLastName = $searchLastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Persons
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string
     */
    public function getRatingPeriod()
    {
        return $this->ratingPeriod;
    }

    /**
     * @param string $ratingPeriod
     * @return Persons
     */
    public function setRatingPeriod($ratingPeriod)
    {
        $this->ratingPeriod = $ratingPeriod;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchTypes()
    {
        return $this->searchTypes;
    }

    /**
     * @param string $searchTypes
     * @return Persons
     */
    public function setSearchTypes($searchTypes)
    {
        $this->searchTypes = $searchTypes;
        return $this;
    }

}