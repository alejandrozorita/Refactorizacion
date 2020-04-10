<?php

namespace App;

/**
 * Class HtmlElement
 *
 * @package App
 */
class HtmlElement
{
    /**
     * @var \App\string
     */
    private $name;


    /**
     * HtmlElement constructor.
     *
     * @param  \App\string  $name
     */
    private function __construct(string $name)
    {

        $this->name = $name;
    }


    /**
     * @return string
     */
    public function render()
    {
        return "HTML RENDER";
    }

}