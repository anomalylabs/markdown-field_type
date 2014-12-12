<?php namespace Anomaly\Streams\Addon\FieldType\Markdown;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class MarkdownFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'field_type.markdown::input';
}
