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
        // Si el elemento trie atributos
        if ( ! empty($this->attributes) ) {

            $htmlAttributes = '';

            foreach ( $this->attributes as $name => $attribute ) {
                $htmlAttributes .= " $name='$attribute'";
            }
            // Abrir la etiqueta con atributos
            $result = "<$this->name$htmlAttributes>";
        } else {
            // Abrir la etiqeuta sin atributos
            $result = "<$this->name>";
        }

        // Si es void
        if(in_array($this->name, ['br','hr','img', 'input', 'meta'])) {
            return $result;
        }

        // Retornar el resultado de una  vez

        $result .= $this->content;

        $result .= "</$this->name>";
        return $result;
    }

}