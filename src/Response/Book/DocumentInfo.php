<?php
namespace Firelike\LitRes\Response\Book;


use Firelike\LitRes\Response\AbstractResponse;
use Firelike\LitRes\Response\Person\Author;

class DocumentInfo extends AbstractResponse
{

    protected $author;

    protected $programUsed;

    protected $date;

    protected $srcUrl;

    protected $srcOcr;

    protected $id;

    protected $version;

    protected $history;


    public function toArray()
    {
        return array(
            'author' => $this->getAuthor(),
            'programUsed' => $this->getProgramUsed(),
            'date' => $this->getDate(),
            'srcUrl' => $this->getSrcUrl(),
            'srcOcr' => $this->getSrcOcr(),
            'id' => $this->getId(),
            'version' => $this->getVersion(),
            'history' => $this->getHistory()
        );
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
     * @return $programUsed
     */
    public function getProgramUsed()
    {
        return $this->programUsed;
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
     * @return $srcUrl
     */
    public function getSrcUrl()
    {
        return $this->srcUrl;
    }


    /**
     *
     * @return $srcOcr
     */
    public function getSrcOcr()
    {
        return $this->srcOcr;
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
     * @return $version
     */
    public function getVersion()
    {
        return $this->version;
    }


    /**
     *
     * @return $history
     */
    public function getHistory()
    {
        return $this->history;
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
     * @param $programUsed
     */
    public function setProgramUsed($programUsed)
    {
        $this->programUsed = $programUsed;
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
     * @param $srcUrl
     */
    public function setSrcUrl($srcUrl)
    {
        $this->srcUrl = $srcUrl;
    }


    /**
     *
     * @param $srcOcr
     */
    public function setSrcOcr($srcOcr)
    {
        $this->srcOcr = $srcOcr;
    }


    /**
     *
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     *
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }


    /**
     *
     * @param $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }
}