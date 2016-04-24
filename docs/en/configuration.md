# Configuration

- [Addon Configuration](#addon)
- [Basic Configuration](#basic)
- [Extra Configuration](#extra)

<hr>

Below is the full configuration available with defaults.

{% code php %}
protected $fields = [
    "example" => [
        "type"   => "anomaly.field_type.country",
        "config" => [
            "default_value" => null,
            "mode"          => "twig",
            "height"        => 500
        ]
    ]
];
{% endcode %}

<hr>

<a name="addon"></a>
## Addon Configuration

The markdown field type configures Ace options using it's `editor.php` config file.

You can override these options by overloading the configuration file with a config file of your own at `/resources/{reference}/config/addons/markdown-field_type/markdown.php`

<div class="alert alert-success">
<strong>Success:</strong> If you feel a popular mode is missing - add it to the config and send a pull request to <a href="https://github.com/anomalylabs/markdown-field_type" target="_blank">https://github.com/anomalylabs/markdown-field_type</a>
</div>

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

    {{ code('php', '"default_type" => "<h1>Hello World</h1>"') }}

The `default_value` is a core option. This field type accepts any string value.

### Input Mode

{{ code('php', '"mode" => "twig"') }}

Specify the input mode to display. The modes are determined by the `editor.php` config file. The mode dictates the syntax highlighting and behavior of the input.

<div class="alert alert-primary">
<strong>Note:</strong> This option determines storage format and can not be set dynamically on the form builder.
</div>

<hr>

<a name="extra"></a>
## Extra Configuration

### Editor Height

{{ code('php', '"height" => 1000') }}

Specify the height of the editor.

<div class="alert alert-info">
<strong>Remember:</strong> The markdown input also supports full screen mode which can be toggled on and off during use.
</div>