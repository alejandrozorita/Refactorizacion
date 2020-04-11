<?php

namespace App;

class HtmlElement
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var null
     */
    private $content;


    /**
     * HtmlElement constructor.
     *
     * @param  \App\string  $name
     * @param $content
     */
    public function __construct(string $name, $content = null)
    {
        $this->name = $name;
        $this->content = $content;
    }


    /**
     * @return string
     */
    public function render()
    {
        $result = "<$this->name>";

        $result .= $this->content;

        $result .= "</$this->name>";
        return $result;
    }

}