# prado-mathml

MathML presentation controls for the [PRADO](https://github.com/pradosoft/prado)
PHP framework. The extension adds one web control for every
[MathML Core](https://www.w3.org/TR/mathml-core/) presentation element, so a
mathematical formula can be authored in a PRADO template the same way any other
markup is — as nested `<com:...>` tags — and rendered as native browser MathML.

```html
<com:TMath Display="block">
    <com:TMrow>
        <com:TMsup>
            <com:TMi>x</com:TMi>
            <com:TMn>2</com:TMn>
        </com:TMsup>
        <com:TMo>+</com:TMo>
        <com:TMi>y</com:TMi>
    </com:TMrow>
</com:TMath>
```

renders

```html
<math display="block"><mrow><msup><mi>x</mi><mn>2</mn></msup><mo>+</mo><mi>y</mi></mrow></math>
```

## Installation

```sh
composer require belisoful/prado-mathml
```

The package is a `prado4-extension` and requires PRADO 4.4 and PHP 8.2. Composer registers its
[class map](config/classMap.json) and [error messages](config/errorMessages.txt)
from the `extra.prado` block of [composer.json](composer.json), so the short
control names (`TMath`, `TMi`, …) resolve in templates with no further
configuration.

## The controls

Every control extends
[`TMathElement`](src/Web/UI/WebControls/Math/TMathElement.php), which extends the
framework's `THtmlElement` → `TWebControl`. So each one:

- renders its MathML tag by default, and the tag can be overridden at runtime with
  the `TagName` property (useful for themes and the `TWebControlDecorator`);
- accepts all the global web-control attributes (`ID`/`id`, `CssClass`/`class`,
  `Style`, `Attributes`, …); and
- exposes the element's own meaningful MathML attributes as typed properties.

MathML boolean attributes render as the literal `true`/`false` values the spec
defines, and every MathML attribute is written **only when set**, so an unset
property leaves the browser's own default in force. Enumerated values (`Display`,
`Form`, `MathVariant`) are matched without regard to case, as MathML Core matches
them, and a value outside the spec throws `TInvalidDataValueException`.

### Global attributes

Every control also carries the MathML Core global attributes, which its content
inherits. They are what `TMstyle` is for:

| Property | Attribute | Value |
| --- | --- | --- |
| `DisplayStyle` | `displaystyle` | `true` (display layout) or `false` (compact layout) |
| `ScriptLevel` | `scriptlevel` | an absolute level (`2`) or a relative one (`+1`, `-1`) |
| `MathColor` | `mathcolor` | a CSS color |
| `MathBackground` | `mathbackground` | a CSS color |
| `MathSize` | `mathsize` | a CSS length or percentage |

```html
<com:TMstyle DisplayStyle="true" MathColor="darkblue">
    <com:TMi>x</com:TMi>
</com:TMstyle>
```

### Root

| Control | Tag | Properties |
| --- | --- | --- |
| `TMath` | `<math>` | `Display` (`block`, `inline`, or empty) |

`TMath.Display` is the MathML `display` attribute. It replaces the CSS `Display`
property every web control inherits, so hide a formula with `Visible="false"` or
`Hidden="true"` rather than `Display="None"`.

### Token elements

Token elements hold text rather than child elements.

| Control | Tag | Properties |
| --- | --- | --- |
| `TMi` | `<mi>` | `MathVariant` (`normal` or empty) |
| `TMn` | `<mn>` | — |
| `TMo` | `<mo>` | `Form`, `Fence`, `Separator`, `Stretchy`, `Symmetric`, `LargeOp`, `MovableLimits`, `LSpace`, `RSpace`, `MinSize`, `MaxSize` |
| `TMtext` | `<mtext>` | — |
| `TMs` | `<ms>` | — |
| `TMspace` | `<mspace>` | `Width`, `Height`, `Depth` |

### General layout

| Control | Tag | Properties |
| --- | --- | --- |
| `TMrow` | `<mrow>` | — |
| `TMfrac` | `<mfrac>` | `LineThickness` |
| `TMsqrt` | `<msqrt>` | — |
| `TMroot` | `<mroot>` | — |
| `TMstyle` | `<mstyle>` | — (the global attributes) |
| `TMerror` | `<merror>` | — |
| `TMpadded` | `<mpadded>` | `Width`, `Height`, `Depth`, `LSpace`, `VOffset` |
| `TMphantom` | `<mphantom>` | — |

### Scripts and limits

| Control | Tag | Properties |
| --- | --- | --- |
| `TMsub` | `<msub>` | — |
| `TMsup` | `<msup>` | — |
| `TMsubsup` | `<msubsup>` | — |
| `TMunder` | `<munder>` | `AccentUnder` |
| `TMover` | `<mover>` | `Accent` |
| `TMunderover` | `<munderover>` | `AccentUnder`, `Accent` |
| `TMmultiscripts` | `<mmultiscripts>` | — |
| `TMprescripts` | `<mprescripts>` | — |

### Tabular math

| Control | Tag | Properties |
| --- | --- | --- |
| `TMtable` | `<mtable>` | — |
| `TMtr` | `<mtr>` | — |
| `TMtd` | `<mtd>` | `ColumnSpan` (at least 1), `RowSpan` (at least 0) |

### Semantics and annotations

| Control | Tag | Properties |
| --- | --- | --- |
| `TSemantics` | `<semantics>` | — |
| `TAnnotation` | `<annotation>` | `Encoding` |
| `TAnnotationXml` | `<annotation-xml>` | `Encoding` |

## Example: a fraction with a stretchy fence

```html
<com:TMath Display="block">
    <com:TMrow>
        <com:TMo Stretchy="true" Fence="true" Form="prefix">(</com:TMo>
        <com:TMfrac>
            <com:TMrow><com:TMi>a</com:TMi><com:TMo>+</com:TMo><com:TMi>b</com:TMi></com:TMrow>
            <com:TMn>2</com:TMn>
        </com:TMfrac>
        <com:TMo Stretchy="true" Fence="true" Form="postfix">)</com:TMo>
    </com:TMrow>
</com:TMath>
```

## Development

The controls carry no PHP-extension dependencies beyond the framework's own; the
test suite instantiates each control and renders it through a `THtmlWriter`, so it
runs on any PHP 8.2+ install.

```sh
composer install
php -l <file>                                        # syntax
vendor/bin/php-cs-fixer fix src   (and: fix tests)   # style (tabs; run src and tests separately)
vendor/bin/phpstan analyse --memory-limit=1G         # static analysis (level 4)
composer unittest                                    # tests (phpunit --testsuite unit)
```

Coverage is gated, not merely reported. Line coverage requires **every** source
file to be fully covered:

```sh
XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite unit --coverage-clover build/logs/clover.xml
php tests/test_tools/coverage-gate.php build/logs/clover.xml
```

Branch coverage is gated separately and more deeply — every branch must be taken:

```sh
XDEBUG_MODE=coverage php -d memory_limit=2G vendor/bin/phpunit --testsuite unit \
    --path-coverage --coverage-php build/logs/coverage.php
php tests/test_tools/branch-gate.php build/logs/coverage.php
```

See [CLAUDE.md](CLAUDE.md) for the coding standards and conventions.

## License

BSD-3-Clause. See [LICENSE](LICENSE).
