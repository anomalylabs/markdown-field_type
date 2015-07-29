# Output

This field type returns the rendered markdown content by default.

### Rendered

Returns the rendered markdown content.

```
// Twig Usage
{{ entry.example.rendered|raw }}

// API usage
$entry->example->rendered();
```

### Parsed

Returns the rendered markdown content put through the parser.

```
// Twig Usage
{{ entry.example.parsed|raw }}

// API usage
$entry->example->parsed();
```
