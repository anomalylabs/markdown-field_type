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
            "height"        => 500
        ]
    ]
];
{% endcode %}

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

    {{ code('php', '"default_value" => "# Hello World"') }}

The `default_value` is a core option. This field type accepts any string value.

<a name="extra"></a>
## Extra Configuration

### Editor Height

{{ code('php', '"height" => 1000') }}

Specify the height of the editor.

<div class="alert alert-info">
<strong>Remember:</strong> The markdown input also supports full screen mode which can be toggled on and off during use.
</div>