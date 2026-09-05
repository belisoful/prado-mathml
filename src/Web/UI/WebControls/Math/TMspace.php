<?php

/**
 * TMspace class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMspace class
 *
 * TMspace represents the MathML `<mspace>` element, a blank space of an explicit
 * size. It is an empty element; any content is layout-insignificant.
 *
 * Properties:
 * - <b>Width</b>, string — the horizontal size (a MathML length). Empty omits it.
 * - <b>Height</b>, string — the size above the baseline. Empty omits it.
 * - <b>Depth</b>, string — the size below the baseline. Empty omits it.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMspace extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mspace';
	}

	/**
	 * @return string the horizontal size. Defaults to '' (no attribute).
	 */
	public function getWidth()
	{
		return $this->getViewState('Width', '');
	}

	/**
	 * @param string $value the horizontal size (a MathML length), rendered as the `width` attribute
	 */
	public function setWidth($value)
	{
		$this->setViewState('Width', $value, '');
	}

	/**
	 * @return string the size above the baseline. Defaults to '' (no attribute).
	 */
	public function getHeight()
	{
		return $this->getViewState('Height', '');
	}

	/**
	 * @param string $value the size above the baseline (a MathML length), rendered as the `height` attribute
	 */
	public function setHeight($value)
	{
		$this->setViewState('Height', $value, '');
	}

	/**
	 * @return string the size below the baseline. Defaults to '' (no attribute).
	 */
	public function getDepth()
	{
		return $this->getViewState('Depth', '');
	}

	/**
	 * @param string $value the size below the baseline (a MathML length), rendered as the `depth` attribute
	 */
	public function setDepth($value)
	{
		$this->setViewState('Depth', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'width', $this->getWidth());
		$this->addStringAttribute($writer, 'height', $this->getHeight());
		$this->addStringAttribute($writer, 'depth', $this->getDepth());
	}
}
