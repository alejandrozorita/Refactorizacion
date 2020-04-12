<?php

namespace App;

class HtmlAttributes
{

    /**
     * @var array
     */
    public $attributes;


    /**
     * HtmlAttributes constructor.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }


    /**
     * @return string
     */
    public function render(): string
    {
        return array_reduce(array_keys($this->attributes), function ($result, $item) {
            return $result . $this->renderAttribute($item);
        }, '');
    }


    /**
     * @param $attribute
     *
     * @return string
     */
    protected function renderAttribute($attribute): string
    {
        if ( is_numeric($attribute) ) {
            return ' ' . $this->attributes[$attribute];
        }

        return ' ' . $attribute . '="' . htmlentities($this->attributes[$attribute], ENT_QUOTES, 'UTF-8') . '"';
    }

}