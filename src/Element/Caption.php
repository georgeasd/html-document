<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Caption
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/caption
 */
final class Caption extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<caption{$attributes}>{$children}\n</caption>\n";
    }

    public function withAttribute(string $name, string $value = null): Caption
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Caption($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Caption
    {
        return new Caption($this->attributes, $this->children->add($element));
    }
}