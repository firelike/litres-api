<?php
namespace Firelike\LitRes\Request;


class Genres extends AbstractRequest
{

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $searchType;


    public function toArray()
    {
        return array_merge(parent::toArray(), array(
            'lang' => $this->getLang(),
            'search_type' => $this->getSearchType()
        ));
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return Genres
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchType()
    {
        return $this->searchType;
    }

    /**
     * @param string $searchType
     * @return Genres
     */
    public function setSearchType($searchType)
    {
        $this->searchType = $searchType;
        return $this;
    }


}