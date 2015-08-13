<?php namespace Anomaly\MarkdownFieldType\Command;

use Anomaly\MarkdownFieldType\MarkdownFieldType;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SyncFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MarkdownFieldType\Command
 */
class SyncFile implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The editor field type instance.
     *
     * @var MarkdownFieldType
     */
    protected $fieldType;

    /**
     * Create a new SyncFile instance.
     *
     * @param MarkdownFieldType $fieldType
     */
    public function __construct(MarkdownFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param EntryRepositoryInterface $repository
     * @return string
     */
    public function handle(EntryRepositoryInterface $repository)
    {
        $path  = $this->fieldType->getStoragePath();
        $entry = $this->fieldType->getEntry();

        $content = $this->dispatch(new GetFile($this->fieldType));

        if (md5($content) == md5($entry->getRawAttribute($this->fieldType->getField()))) {
            return $content;
        }

        if (filemtime($path) > $entry->lastModified()->timestamp) {
            $repository->save($entry->setRawAttribute($this->fieldType->getField(), $content));
        }

        return $content;
    }
}
