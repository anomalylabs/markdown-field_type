<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\String;
use Michelf\Markdown;

/**
 * Class MarkdownFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MarkdownFieldType
 */
class MarkdownFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The string parser.
     *
     * @var String
     */
    protected $string;

    /**
     * The decorated field type.
     * This is for IDE hinting.
     *
     * @var MarkdownFieldType
     */
    protected $object;

    /**
     * The markdown editor.
     *
     * @var Markdown
     */
    protected $markdown;

    /**
     * Create a new MarkdownFieldTypePresenter instance.
     *
     * @param String   $string
     * @param Markdown $markdown
     * @param          $object
     */
    public function __construct(String $string, Markdown $markdown, $object)
    {
        $this->string   = $string;
        $this->markdown = $markdown;

        parent::__construct($object);
    }

    /**
     * Return the rendered content.
     *
     * @return string
     */
    public function rendered()
    {
        return $this->markdown->transform($this->object->getValue());
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function parsed()
    {
        return $this->string->render($this->rendered());
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->rendered();
    }
}
