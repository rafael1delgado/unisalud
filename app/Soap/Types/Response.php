<?php

namespace App\Soap\Types;


class Response
{
    /**
     * @var boolean
     */
    public $result = false;

    /**
     * @var string
     */
    public $text = '';

    /**
     * Response constructor.
     * @param boolean $result
     * @param string $text
     */
    public function __construct($result = false, $text = '')
    {
        $this->result = $result;
        $this->text = $text;
    }

}
