<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\MarkdownFieldType\Command\GetFile;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class MarkdownFieldTypeAccessor
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\EditorFieldType
 */
class MarkdownFieldTypeAccessor extends FieldTypeAccessor
{

    use DispatchesCommands;

    /**
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        return $this->dispatch(new GetFile($this->fieldType));
    }
}
