<?php
namespace Firelike\LitRes\Response\Book;

use Firelike\LitRes\Response\AbstractResponse;

class PublishInfo extends AbstractResponse
{

    protected $bookName;

    protected $publisher;

    protected $city;

    protected $year;

    protected $isbn;

    protected $sequence;


    public function toArray()
    {
        return array(
            'bookName' => $this->getBookName(),
            'publisher' => $this->getPublisher(),
            'city' => $this->getCity(),
            'year' => $this->getYear(),
            'isbn' => $this->getIsbn(),
            'sequence' => $this->getSequence()
        );
    }


    /**
     *
     * @return $bookName
     */
    public function getBookName()
    {
        return $this->bookName;
    }


    /**
     *
     * @return $publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }


    /**
     *
     * @return $city
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     *
     * @return $year
     */
    public function getYear()
    {
        return $this->year;
    }


    /**
     *
     * @return $isbn
     */
    public function getIsbn()
    {
        return $this->isbn;
    }


    /**
     *
     * @return $sequence
     */
    public function getSequence()
    {
        return $this->sequence;
    }


    /**
     *
     * @param $bookName
     */
    public function setBookName($bookName)
    {
        $this->bookName = $bookName;
    }


    /**
     *
     * @param $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }


    /**
     *
     * @param $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }


    /**
     *
     * @param $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }


    /**
     *
     * @param $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }


    /**
     *
     * @param $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }
}