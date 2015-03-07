<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

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
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        return app('Michelf\Markdown')->transform($this->object->getValue());
    }
}
