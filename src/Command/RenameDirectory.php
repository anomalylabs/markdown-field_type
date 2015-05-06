<?php namespace Anomaly\MarkdownFieldType\Command;

use Anomaly\MarkdownFieldType\MarkdownFieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class RenameDirectory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MarkdownFieldType\Command
 */
class RenameDirectory implements SelfHandling
{

    /**
     * The markdown field type instance.
     *
     * @var MarkdownFieldType
     */
    protected $fieldType;

    /**
     * Create a new RenameDirectory instance.
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
        $entry = $this->fieldType->getEntry();
        $path  = $this->fieldType->getStoragePath();

        $paths = $directories = $files->glob(
            $pattern = dirname(dirname($path)) . '/*_' . $entry->getId(),
            GLOB_ONLYDIR
        );

        /**
         * Remove the target directory
         * if it exists already.
         */
        if ($files->isDirectory(dirname($path))) {
            $files->deleteDirectory(dirname($path), true);
        }

        if ($path && $files->isDirectory(dirname($old = array_shift($paths)))) {
            $files->move($old, dirname($path));
        }
    }
}
