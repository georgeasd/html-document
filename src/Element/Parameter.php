<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Parameter
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/param
 */
final class Parameter extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('param', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Parameter
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Parameter($this->attributes->add($attribute));
    }

    public function withName(string $name): Parameter
    {
        return $this->withAttribute('name', $name);
    }

    public function withValue(string $value): Parameter
    {
        return $this->withAttribute('value', $value);
    }
}
