<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\MarkdownFieldType\Command\SyncFile;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Illuminate\Foundation\Bus\DispatchesJobs;

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

    use DispatchesJobs;

    /**
     * The field type instance.
     * This is for IDE hinting.
     *
     * @var MarkdownFieldType
     */
    protected $fieldType;

    /**
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        return $this->dispatch(new SyncFile($this->fieldType));
    }
}
