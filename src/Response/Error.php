<?php
namespace Firelike\LitRes\Response;

class Error
{

    protected $ErrorID;

    protected $ErrorText;


    public function __construct ($inErrorID, $inErrorText)
    {
        $this->ErrorID = $inErrorID;
        $this->ErrorText = $inErrorText;
    }


    public function getErrorMessage ()
    {
        return 'Operation failed.More Info: <div>' . $this->ErrorText . ' [ Code ' . $this->ErrorID . ' ]</div>';
    }


    public function toArray ()
    {
        return array( 
            'Error' => array( 
                'ErrorID' => $this->ErrorID , 
                'ErrorText' => $this->ErrorText 
            ) 
        );
    }


}
