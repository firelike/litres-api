<?php
namespace Firelike\LitRes\Request;


class Browser extends AbstractRequest
{

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $search;

    /**
     * @var string
     */
    protected $limit;

    /**
     * @var string
     */
    protected $sort;


    public function toArray()
    {
        return array_merge(parent::toArray(), array(
            'lang' => $this->getLang(),
            'search' => $this->getSearch(),
            'limit' => $this->getLimit(),
            'sort' => $this->getSort()
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
     * @return Browser
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param string $search
     * @return Browser
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @return string
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param string $limit
     * @return Browser
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return Browser
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }


}