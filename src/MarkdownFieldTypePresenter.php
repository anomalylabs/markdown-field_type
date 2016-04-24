<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Support\Template;
use Michelf\Markdown;

/**
 * Class MarkdownFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\MarkdownFieldType
 */
class MarkdownFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The template parser.
     *
     * @var Template
     */
    protected $template;

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
     * @param Template $template
     * @param Markdown $markdown
     * @param          $object
     */
    public function __construct(Template $template, Markdown $markdown, $object)
    {
        $this->template = $template;
        $this->markdown = $markdown;

        parent::__construct($object);
    }

    /**
     * Return the rendered content.
     *
     * @return string
     */
    public function render()
    {
        return $this->markdown->transform($this->object->getValue());
    }

    /**
     * Return the rendered content.
     *
     * @return string
     * @deprecated since version 2.0
     */
    public function rendered()
    {
        return $this->render();
    }

    /**
     * Return the parsed content.
     *
     * @param array $payload
     * @return string
     */
    public function parse(array $payload = [])
    {
        return $this->template->render($this->render(), (new Decorator())->decorate($payload));
    }

    /**
     * Return the parsed content.
     *
     * @param array $payload
     * @return string
     */
    public function parsed(array $payload = [])
    {
        return $this->parse($payload);
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        if (!$this->object->getValue()) {
            return '';
        }

        return $this->render();
    }
}
