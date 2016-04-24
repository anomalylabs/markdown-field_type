# Configuration

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

<a name="basic"></a>
## Basic Configuration

### Default Value

    {{ code('php', '"default_value" => "<h1>Hello World</h1>"') }}

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