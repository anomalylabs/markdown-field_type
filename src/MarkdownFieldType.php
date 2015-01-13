<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class MarkdownFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MarkdownFieldType
 */
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
    protected $inputView = 'anomaly.field_type.markdown::input';

}
