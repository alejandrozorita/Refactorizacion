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
     * @var array
     */
    private $attributes;


    /**
     * HtmlElement constructor.
     *
     * @param  string  $name
     * @param  array  $attributes
     * @param $content
     */
    public function __construct(string $name, array $attributes = [], $content = NULL)
    {
        $this->name = $name;
        $this->content = $content;
        $this->attributes = new HtmlAttributes($attributes);
    }


    /**
     * @return string
     */
    public function render()
    {
        if ( $this->isVoid() ) {
            return $this->open();
        }

        return $this->open() . $this->content() . $this->close();
    }


    /**
     * @return string
     */
    public function open(): string
    {
        return '<' . $this->name . $this->attributes() . '>';
    }


    /**
     * @return string
     */
    public function content(): string
    {
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }


    /**
     * @return string
     */
    public function close(): string
    {
        return "</$this->name>";
    }


    /**
     * @return string
     */
    public function attributes(): string
    {
        return $this->attributes->render();
    }


    /**
     * @return bool
     */
    public function isVoid(): bool
    {
        return in_array($this->name, [ 'br', 'hr', 'img', 'input', 'meta' ]);
    }

}