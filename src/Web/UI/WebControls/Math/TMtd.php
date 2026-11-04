<?php

/**
 * TMtd class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\Exceptions\TInvalidDataValueException;

/**
 * TMtd class
 *
 * TMtd represents the MathML `<mtd>` element, a single cell within an {@see TMtr}
 * row of an {@see TMtable}. Its content is the MathML expression drawn in the cell.
 *
 * Properties:
 * - <b>ColumnSpan</b>, integer — how many columns the cell spans, at least 1.
 *   Unset (the default) renders no attribute, so the cell spans one column.
 * - <b>RowSpan</b>, integer — how many rows the cell spans, at least 0; 0 spans
 *   to the last row, as an HTML `<td rowspan="0">` does. Unset (the default)
 *   renders no attribute, so the cell spans one row.
 *
 * Both follow the HTML `<td>` `colspan`/`rowspan` rules. A value that is not an
 * integer, or is below the minimum, throws.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMtd extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mtd';
	}

	/**
	 * @return null|int the number of columns the cell spans. Defaults to null (no attribute).
	 */
	public function getColumnSpan()
	{
		return $this->getViewState('ColumnSpan', null);
	}

	/**
	 * @param null|int|string $value the number of columns spanned, at least 1; '' or null omits the attribute
	 * @throws TInvalidDataValueException if the value is not an integer of at least 1
	 */
	public function setColumnSpan($value)
	{
		$this->setViewState('ColumnSpan', $this->ensureSpan('ColumnSpan', $value, 1), null);
	}

	/**
	 * @return null|int the number of rows the cell spans. Defaults to null (no attribute).
	 */
	public function getRowSpan()
	{
		return $this->getViewState('RowSpan', null);
	}

	/**
	 * @param null|int|string $value the number of rows spanned, at least 0; '' or null omits the attribute
	 * @throws TInvalidDataValueException if the value is not an integer of at least 0
	 */
	public function setRowSpan($value)
	{
		$this->setViewState('RowSpan', $this->ensureSpan('RowSpan', $value, 0), null);
	}

	/**
	 * Validates a span value.
	 * @param string $property the property name, for the error message
	 * @param mixed $value the span; null or '' means unset
	 * @param int $minimum the smallest valid span
	 * @throws TInvalidDataValueException if the value is not an integer of at least $minimum
	 * @return ?int the span, or null when unset
	 */
	private function ensureSpan(string $property, $value, int $minimum): ?int
	{
		if ($value === null || $value === '') {
			return null;
		}
		$span = filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => $minimum]]);
		if ($span === false) {
			throw new TInvalidDataValueException('math_table_span_invalid', $property, $value, $minimum);
		}
		return $span;
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		if (($columnSpan = $this->getColumnSpan()) !== null) {
			$writer->addAttribute('columnspan', (string) $columnSpan);
		}
		if (($rowSpan = $this->getRowSpan()) !== null) {
			$writer->addAttribute('rowspan', (string) $rowSpan);
		}
	}
}
