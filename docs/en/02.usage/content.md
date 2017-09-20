## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You can set the markdown field type value with a string.

    $entry->example = $content;


### Basic Output[](#usage/basic-output)

The markdown field type always returns the **unparsed** storage file content.

    $entry->example; // Contents of storage::example/input.md


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\MarkdownFieldType\MarkdownFieldTypePresenter` class.


#### MarkdownFieldTypePresenter::path()[](#usage/presenter-output/markdownfieldtypepresenter-path)

The `path` method returns the prefix hinted path to the storage file.

###### Returns: `string`

###### Example

    $decorated->example->path(); // storage::path/example.md

###### Twig

    {{ decorated.example.path() }} // storage::path/example.md


#### MarkdownFieldTypePresenter::render()[](#usage/presenter-output/markdownfieldtypepresenter-render)

The `render` method renders the content through the markdown engine.

###### Returns: `string`

###### Example

    $decorated->example->render();

###### Twig

    {{ decorated.example.render()|raw }}


#### MarkdownFieldTypePresenter::parse()[](#usage/presenter-output/markdownfieldtypepresenter-parse)

The `parse` method runs the rendered markdown content through the view engine. This is great for parsing Twig in `markdown` files.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$payload

</td>

<td>

false

</td>

<td>

array

</td>

<td>

null

</td>

<td>

Additional payload data for the view.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->parse(['name' => 'Ryan']);

###### Twig

    {{ decorated.example.parse({'name': 'Ryan'})|raw }}

###### Parsing content before rendering with markdown

If you need to parse the content of the file _before_ running it through the markdown rendering you can try this:

    {{ decorated.example.parse()|markdown|raw }}


#### MarkdownFieldTypePresenter::content()[](#usage/presenter-output/markdownfieldtypepresenter-content)

The `content` method returns the raw storage file content.

###### Returns: `string`

###### Example

    $decorated->example->content();

###### Twig

    {{ decorated.example.content() }}


#### MarkdownFieldTypePresenter::excerpt()[](#usage/presenter-output/markdownfieldtypepresenter-excerpt)

The `excerpt` method returns a limited snippet from the `text` method while preserving whole words.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$length

</td>

<td>

false

</td>

<td>

integer

</td>

<td>

100

</td>

<td>

The length to limit the value by.

</td>

</tr>

<tr>

<td>

$end

</td>

<td>

false

</td>

<td>

string

</td>

<td>

...

</td>

<td>

The ending for the string only if truncated.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->excerpt();

###### Twig

    {{ decorated.example.excerpt() }}


#### MarkdownFieldTypePresenter::text()[](#usage/presenter-output/markdownfieldtypepresenter-text)

The `text` method returns the text-only content from the storage file.

###### Returns: `string`

###### Example

    $decorated->example->text();

###### Twig

    {{ decorated.example.text() }}


#### MarkdownFieldTypePresenter::__toString()[](#usage/presenter-output/markdownfieldtypepresenter-tostring)

The `__toString` method is mapped to the `render` method.

###### Returns: `string`

###### Example

    $decorated->example;

###### Twig

    {{ decorated.example|raw }}

<div class="alert alert-danger">**Heads Up:** The **__toString** will not properly display exceptions spurring from value content.</div>
