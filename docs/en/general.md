# Markdown Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.markdown`

The markdown field type provides a rich markdown editor input.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.markdown',
            'config' => [
                'height' => 500
            ]
        ]
    ];

### `height`

The height in pixels of the markdown editor. The default value is `300`.


<a name="output"></a>
## Output

This field type returns the rendered markdown content by default.

### `rendered()`

Returns the rendered content.

    // Twig usage
    {{ entry.example.rendered|raw }}
    
    // API usage
    echo $entry->example->rendered;

### `parsed()`

Returns the content passed through the parser. Use caution when allowing access to be parser.

    // Twig usage
    {{ entry.example.parsed|raw }}
    
    // API usage
    $entry->example->parsed;

