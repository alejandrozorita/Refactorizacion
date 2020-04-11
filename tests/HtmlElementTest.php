<?php

namespace Tests;

use App\HtmlElement;

class HtmlElementTest extends TestCase
{
    /**
     * @test
     */
    function it_checks_if_a_element_is_void_or_not()
    {
        $this->assertFalse(( new HtmlElement('p') )->isVoid());
        $this->assertTrue(( new HtmlElement('img') )->isVoid ());
    }

    /**
     * @test
     */
    function it_generate_attributes()
    {
        $element = new HtmlElement('span', ['class' => 'a_class', 'id' => 'theSpan']);

        $this->assertSame(' class="a_class" id="theSpan"', $element->attributes());
    }


    /**
     * @test
     */
    function it_generates_a_paragraph_whit_content()
    {
        $elements = new HtmlElement('p', [], 'Este es el conteido');

        $this->assertSame(
          '<p>Este es el conteido</p>',
          $elements->render()
        );
    }


    /**
     * @test
     */
    function it_generates_a_paragraph_whit_content_and_id_attribute()
    {
        $elements = new HtmlElement('p', [ 'id' => 'idElement' ], 'Este es el conteido');

        $this->assertSame(
          '<p id="idElement">Este es el conteido</p>',
          $elements->render()
        );
    }


    /**
     * @test
     */
    function it_generates_a_paragraph_whit_multiple_attributes()
    {
        $elements = new HtmlElement(
          'p', [ 'id' => 'idElement', 'class' => 'succces' ], 'Este es el conteido'
        );

        $this->assertSame(
          '<p id="idElement" class="succces">Este es el conteido</p>',
          $elements->render()
        );
    }


    /**
     * @test
     */
    function it_generates_an_img_tag()
    {
        $elements = new HtmlElement(
          'img', [ 'src' => 'img.jpg' ]
        );

        $this->assertSame(
          '<img src="img.jpg">',
          $elements->render()
        );
    }


    /**
     * @test
     */
    function it_escpoes_the_html_attributes()
    {
        $elements = new HtmlElement(
          'img', [ 'src' => 'img.jpg', 'title' => 'Curso de "Refactorización" de alejandro' ]
        );

        $this->assertSame(
          '<img src="img.jpg" title="Curso de &quot;Refactorizaci&oacute;n&quot; de alejandro">',
          $elements->render()
        );
    }


    /**
     * @test
     */
    function it_generate_elements_with_boolean_attributes()
    {
        $elements = new HtmlElement(
          'input', [ 'required' ]
        );

        $this->assertSame(
          '<input required>',
          $elements->render()
        );
    }

}