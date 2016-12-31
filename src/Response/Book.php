<?php
namespace Firelike\LitRes\Response;


use Firelike\LitRes\Response\Book\DocumentInfo;
use Firelike\LitRes\Response\Book\PublishInfo;
use Firelike\LitRes\Response\Book\TitleInfo;

class Book extends AbstractResponse
{

    protected $textDescription;

    protected $files;

    protected $categories;

    protected $sequences;

    protected $artTags;

    protected $cover;

    protected $coverW;

    protected $coverH;

    protected $coverPreview;

    protected $url;

    protected $price;


    public function toArray()
    {
        $textDescription = $this->getTextDescription();
        $hidden = $textDescription['hidden'];
        $titleInfo = new TitleInfo($hidden['title-info']);
        $documentInfo = new DocumentInfo($hidden['document-info']);
        $publishInfo = new PublishInfo($hidden['publish-info']);


        return array(
            'cover' => $this->getCover(),
            'coverW' => $this->getCoverW(),
            'coverH' => $this->getCoverH(),
            'coverPreview' => $this->getCoverPreview(),
            'url' => $this->getUrl(),
            'price' => $this->getPrice(),
            'titleInfo' => $titleInfo->toArray(),
            'documentInfo' => $documentInfo->toArray(),
            'publishInfo' => $publishInfo->toArray(),
            'files' => $this->getFiles(),
            'categories' => $this->getCategories(),
            'sequences' => $this->getSequences(),
            'artTags' => $this->getArtTags()
        );
    }


    /**
     *
     * @return $textDescription
     */
    public function getTextDescription()
    {
        return $this->textDescription;
    }


    /**
     *
     * @return $files
     */
    public function getFiles()
    {
        return $this->files;
    }


    /**
     *
     * @return $artTags
     */
    public function getArtTags()
    {
        return $this->artTags;
    }


    /**
     *
     * @param $textDescription
     */
    public function setTextDescription($textDescription)
    {
        $this->textDescription = $textDescription;
    }


    /**
     *
     * @param $files
     */
    public function setFiles($files)
    {
        $files = array_shift($files);
        $this->files = $files;
    }


    /**
     *
     * @param $artTags
     */
    public function setArtTags($artTags)
    {
        $artTags = array_shift($artTags);
        $this->artTags = $artTags;
    }


    /**
     *
     * @return $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }


    /**
     *
     * @return $sequences
     */
    public function getSequences()
    {
        return $this->sequences;
    }


    /**
     *
     * @param $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }


    /**
     *
     * @param $sequences
     */
    public function setSequences($sequences)
    {
        $this->sequences = $sequences;
    }


    /**
     *
     * @return $cover
     */
    public function getCover()
    {
        return $this->cover;
    }


    /**
     *
     * @return $coverW
     */
    public function getCoverW()
    {
        return $this->coverW;
    }


    /**
     *
     * @return $coverH
     */
    public function getCoverH()
    {
        return $this->coverH;
    }


    /**
     *
     * @return $coverPreview
     */
    public function getCoverPreview()
    {
        return $this->coverPreview;
    }


    /**
     *
     * @return $url
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     *
     * @return $price
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     *
     * @param $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }


    /**
     *
     * @param $coverW
     */
    public function setCoverW($coverW)
    {
        $this->coverW = $coverW;
    }


    /**
     *
     * @param $coverH
     */
    public function setCoverH($coverH)
    {
        $this->coverH = $coverH;
    }


    /**
     *
     * @param $coverPreview
     */
    public function setCoverPreview($coverPreview)
    {
        $this->coverPreview = $coverPreview;
    }


    /**
     *
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }


    /**
     *
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}