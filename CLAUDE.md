# prado-mathml

A PRADO 4 extension providing a web control for every MathML Core presentation
element: the `<math>` root; the token elements `mi`/`mn`/`mo`/`ms`/`mtext`/`mspace`;
the layout elements `mrow`/`mfrac`/`msqrt`/`mroot`/`mstyle`/`merror`/`mpadded`/`mphantom`;
the script and limit elements `msub`/`msup`/`msubsup`/`munder`/`mover`/`munderover`/`mmultiscripts`/`mprescripts`;
the table elements `mtable`/`mtr`/`mtd`; and `semantics`/`annotation`/`annotation-xml`.
Each renders its tag through PRADO's `TWebControl`, with the element's key MathML
attributes exposed as typed component properties.

## Version

- **Current version: v0.1.0** (initial release).
- Because this is the initial release, source docblocks carry **no `@since` tags** —
  do not add them.

## Key facts

- Classes live under `Prado\Web\UI\WebControls\Math\` (PSR-4 `Prado\` → `src/`).
  This extension does **not** edit the framework's `classes.php`; the Prado3 short
  names come from `config/classMap.json`, and both it and `config/errorMessages.txt`
  are registered by **Composer** from `composer.json` `extra.prado` — not by any
  module.
- Every control extends `TMathElement`, which extends the framework's
  `THtmlElement` (so `TagName`/`getDefaultTagName`/`getIsMutated` and the whole
  `TWebControl` machinery are inherited). The text/token elements additionally share
  `TMathToken` (the `MathVariant` property). These two are the only `abstract`
  classes; they are not registered for template use but appear in the class map for
  completeness.
- A control renders its MathML tag by overriding `getDefaultTagName()`. Anything
  beyond the tag is an element-specific attribute, added by overriding
  `addAttributesToRender($writer)`: call `parent::addAttributesToRender($writer)`
  first, then add this element's attributes.
- Attributes are written **only when set**, so an unset property leaves the MathML
  user-agent default in force. Two helpers on `TMathElement` enforce this:
  `addStringAttribute()` (omits an empty string) and `addBoolAttribute()` (omits
  `null`, else renders the literal `true`/`false` — MathML booleans are *value*
  attributes, never HTML-style presence attributes).
- Optional attributes are tri-state where "unset" must be distinguishable from a
  set value: string attributes default to `''`, booleans and integers to `null`.
  A boolean/integer setter maps `null` **and** `''` to the unset state (so a template
  can clear one with `Prop=""`) and otherwise coerces through `TPropertyValue`.
- Enumerated attributes validate on set and throw
  `TInvalidDataValueException` with a code from `config/errorMessages.txt`
  (`TMath::Display` → `math_display_invalid`; `TMo::Form` →
  `math_operator_form_invalid`). Empty is always allowed and means "no attribute".
- Error message entries are **ICU MessageFormat** patterns (PRADO formats them with
  `MessageFormatter`). An apostrophe next to a brace is doubled: write `''{0}''` to
  quote an argument — `'{0}'` renders the literal text `{0}`. Other apostrophes, as
  in `'block'`, are literal.
- Modeled properties are stored in **view state** (`getViewState`/`setViewState`),
  like the framework's own `TDetails`, not in private fields — so they survive
  postback. `TagName` is the one exception, held by `THtmlElement` in a private field.
- This is a new, pre-release codebase with no published API to preserve: **backward
  compatibility is not a constraint** — prefer the better design.

## Adding a control

1. Create `src/Web/UI/WebControls/Math/T<Name>.php` extending `TMathElement` (or
   `TMathToken` for a text element), overriding `getDefaultTagName()`.
2. Model each meaningful MathML attribute as a get/set property pair over view state,
   and render it in `addAttributesToRender()` via the helpers.
3. Add the short name to `config/classMap.json` (keep it sorted).
4. Add `tests/unit/Web/UI/WebControls/Math/T<Name>Test.php` covering the default tag,
   the base-class relationship, rendering, a `TagName` override, and **both** the set
   and unset path of every property (the coverage and branch gates require it).

## Checks (all must pass before commit)

```sh
php -l <file>                                        # syntax
vendor/bin/php-cs-fixer fix src   (and: fix tests)   # style (tabs; run src and tests separately)
vendor/bin/phpstan analyse --memory-limit=1G         # static analysis (level 4)
composer unittest                                    # tests (phpunit --testsuite unit)
```

Line coverage is gated per file — **every** source file must be fully covered
(`tests/test_tools/coverage-gate.php`, `ALLOWED_UNCOVERED` is empty):

```sh
XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite unit --coverage-clover build/logs/clover.xml
php tests/test_tools/coverage-gate.php build/logs/clover.xml
```

Branch coverage is gated separately and more deeply — every branch must be taken
(`tests/test_tools/branch-gate.php`, `MAX_UNTAKEN` is 0). It runs on pull requests,
on commits to main, and on demand, because path instrumentation is far slower than
the suite:

```sh
XDEBUG_MODE=coverage php -d memory_limit=2G vendor/bin/phpunit --testsuite unit \
    --path-coverage --coverage-php build/logs/coverage.php
php tests/test_tools/branch-gate.php build/logs/coverage.php
```

Cover new code with tests, not with `@codeCoverageIgnore`. In particular, a tri-state
setter needs a test that passes a real value, one that passes `''`, and one that
passes `null`, or the branch gate will flag the untaken edge of the `null`/`''` guard.
