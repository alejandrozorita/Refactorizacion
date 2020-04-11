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
        $this->attributes = $attributes;
    }


    /**
     * @return string
     */
    public function render()
    {
        $result = $this->open();

        if ( $this->isVoid() ) {
            return $result;
        }
        $result .= $this->content();
        $result .= $this->close();
        return $result;
    }


    /**
     * @return bool
     */
    public function isVoid(): bool
    {
        return in_array($this->name, [ 'br', 'hr', 'img', 'input', 'meta' ]);
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

        /*
         *
         if ( empty($this->attributes) ) {
            return '';
        }

         */
        if ( ! $this->hasAttributes() ) {
            return '';
        }

        $htmlAttributes = '';

        foreach ( $this->attributes as $attribute => $value ) {
            $htmlAttributes .= $this->renderAttribute($attribute, $value);
        }

        return $htmlAttributes;
    }


    /**
     * @return bool
     */
    public function hasAttributes(): bool
    {
        return ! empty($this->attributes);
    }


    /**
     * @param $attribute
     * @param $value
     *
     * @return string
     */
    protected function renderAttribute($attribute, $value): string
    {
        if ( is_numeric($attribute) ) {
            return " $value";
        }

        return ' ' . $attribute . '="' . htmlentities($value, ENT_QUOTES, 'UTF-8') . '"';
    }

}