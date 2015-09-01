<?php namespace Anomaly\MarkdownFieldType\Command;

use Anomaly\MarkdownFieldType\MarkdownFieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GetFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MarkdownFieldType\Command
 */
class GetFile implements SelfHandling
{

    /**
     * The editor field type instance.
     *
     * @var MarkdownFieldType
     */
    protected $fieldType;

    /**
     * Create a new GetFile instance.
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
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $path = $this->fieldType->getStoragePath();

        if ($path && $files->isFile($path)) {
            return $files->get($path);
        }

        return null;
    }
}
