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
        $result = $this->openTag();

        if ( $this->isVoidElement() ) {
            return $result;
        }
        $result .= $this->renderContent();
        $result .= $this->closeTag();
        return $result;
    }


    /**
     * @return bool
     */
    public function isVoidElement(): bool
    {
        return in_array($this->name, [ 'br', 'hr', 'img', 'input', 'meta' ]);
    }


    /**
     * @return string
     */
    protected function openTag()
    {
        if ( ! empty($this->attributes) ) {

            $htmlAttributes = '';

            foreach ( $this->attributes as $attribute => $value ) {
                if ( is_numeric($attribute) ) {
                    $htmlAttributes .= " $value";
                } else {
                    $htmlAttributes .= ' ' . $attribute . '="' . htmlentities($value, ENT_QUOTES, 'UTF-8') . '"';
                }
            }

            // Abrir la etiqueta con atributos
            $result = "<$this->name$htmlAttributes>";
        } else {

            // Abrir la etiqeuta sin atributos
            $result = "<$this->name>";
        }
        return $result;
    }


    /**
     * @return string
     */
    protected function renderContent(): string
    {
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }


    /**
     * @return string
     */
    protected function closeTag(): string
    {
        return "</$this->name>";
    }

}