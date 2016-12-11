<?php namespace Anomaly\MarkdownFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class MarkdownFieldTypeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class MarkdownFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * Register the addon.
     *
     * @param MarkdownFieldType $fieldType
     */
    public function register(MarkdownFieldType $fieldType)
    {
        $fieldType->on('entry_saved', MarkdownFieldTypeCallbacks::class . '@onEntrySaved');
        $fieldType->on('entry_deleted', MarkdownFieldTypeCallbacks::class . '@onEntryDeleted');
        $fieldType->on('entry_translation_saved', MarkdownFieldTypeCallbacks::class . '@onEntryTranslationSaved');
        $fieldType->on('entry_translation_deleted', MarkdownFieldTypeCallbacks::class . '@onEntryTranslationDeleted');
    }
}
