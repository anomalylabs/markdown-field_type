<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\MarkdownFieldType\Command\GetFile;
use Anomaly\MarkdownFieldType\Command\PutFile;
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
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        if (!file_exists($this->fieldType->getStoragePath())) {
            $this->dispatch(new PutFile($this->fieldType));
        }

        return $this->dispatch(new GetFile($this->fieldType));
    }
}
