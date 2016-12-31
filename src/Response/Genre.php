<?php
namespace Firelike\LitRes\Response;


class Genre extends AbstractResponse
{

    protected $genre;


    public function toArray()
    {
        return array(
            'genre' => $this->getGenre()
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
     * @param $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
}