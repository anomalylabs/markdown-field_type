<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\MarkdownFieldType\Command\RenameDirectory;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;

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

    /**
     * The application utility.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new EditorFieldType instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'height' => 300
    ];

    /**
     * Get the file path.
     *
     * @return string
     */
    public function getFilePath()
    {
        if (!$this->entry->exists) {
            return null;
        }

        $slug      = $this->entry->getStreamSlug();
        $namespace = $this->entry->getStreamNamespace();
        $directory = $this->entry->getEntryId();
        $file      = $this->getFileName();

        return "{$namespace}/{$slug}/{$directory}/{$file}";
    }

    /**
     * Get the storage path.
     *
     * @return string
     */
    public function getStoragePath()
    {
        if (!$path = $this->getFilePath()) {
            return null;
        }

        return $this->application->getStoragePath($path);
    }

    /**
     * Get the asset path.
     *
     * @return string
     */
    public function getAssetPath()
    {
        if (!$path = $this->getFilePath()) {
            return null;
        }

        return 'storage::' . $this->getFilePath($path);
    }

    /**
     * Get the storage file name.
     *
     * @return string
     */
    protected function getFileName()
    {
        return trim($this->getField() . '_' . $this->getLocale(), '_') . '.md';
    }
}
