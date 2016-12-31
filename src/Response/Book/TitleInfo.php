<?php
namespace Firelike\LitRes\Response\Book;

use Firelike\LitRes\Response\AbstractResponse;
use Firelike\LitRes\Response\Person\Author;

class TitleInfo extends AbstractResponse
{

    protected $genre;

    protected $author;

    protected $bookTitle;

    protected $annotation;

    protected $date;

    protected $coverPage;

    protected $lang;

    protected $sequence;

    public function toArray()
    {
        return array(
            'genre' => $this->getGenre(),
            'author' => $this->getAuthor(),
            'bookTitle' => $this->getBookTitle(),
            'annotation' => $this->getAnnotation(),
            'date' => $this->getDate(),
            'coverPage' => $this->getCoverPage(),
            'lang' => $this->getLang(),
            'sequence' => $this->getSequence()
        );
    }


    /**
     *
     * @return $genre
     */
    public function getGenre()
    {
        return $this->genre;
    }


    /**
     *
     * @return $author
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     *
     * @return $bookTitle
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }


    /**
     *
     * @return $annotation
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }


    /**
     *
     * @return $date
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     *
     * @return $coverPage
     */
    public function getCoverPage()
    {
        return $this->coverPage;
    }


    /**
     *
     * @return $lang
     */
    public function getLang()
    {
        return $this->lang;
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
     * @param $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }


    /**
     *
     * @param $author
     */
    public function setAuthor($author)
    {
        $a = new Author($author);
        $this->author = $a->toArray();

    }


    /**
     *
     * @param $bookTitle
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;
    }


    /**
     *
     * @param $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }


    /**
     *
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    /**
     *
     * @param $coverPage
     */
    public function setCoverPage($coverPage)
    {
        $this->coverPage = $coverPage;
    }


    /**
     *
     * @param $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
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