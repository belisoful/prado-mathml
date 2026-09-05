<?php

/**
 * TMtd class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;

/**
 * TMtd class
 *
 * TMtd represents the MathML `<mtd>` element, a single cell within an {@see TMtr}
 * row of an {@see TMtable}. Its content is the MathML expression drawn in the cell.
 *
 * Properties:
 * - <b>ColumnSpan</b>, integer — how many columns the cell spans. Unset (the
 *   default) renders no attribute, so the cell spans one column.
 * - <b>RowSpan</b>, integer — how many rows the cell spans. Unset (the default)
 *   renders no attribute.
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
	 * @param null|int|string $value the number of columns spanned; '' or null omits the attribute
	 */
	public function setColumnSpan($value)
	{
		$this->setViewState('ColumnSpan', ($value === null || $value === '') ? null : TPropertyValue::ensureInteger($value), null);
	}

	/**
	 * @return null|int the number of rows the cell spans. Defaults to null (no attribute).
	 */
	public function getRowSpan()
	{
		return $this->getViewState('RowSpan', null);
	}

	/**
	 * @param null|int|string $value the number of rows spanned; '' or null omits the attribute
	 */
	public function setRowSpan($value)
	{
		$this->setViewState('RowSpan', ($value === null || $value === '') ? null : TPropertyValue::ensureInteger($value), null);
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
