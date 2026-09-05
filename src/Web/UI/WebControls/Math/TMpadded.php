<?php

/**
 * TMpadded class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/pradosoft/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMpadded class
 *
 * TMpadded represents the MathML `<mpadded>` element, which adjusts the size and
 * position of its contents without changing how they are drawn. Its properties
 * accept MathML lengths, which may be given relative to the content's own metrics
 * (for example `+2px` or `50%width`).
 *
 * Properties:
 * - <b>Width</b>, string — the reported width. Empty omits it.
 * - <b>Height</b>, string — the reported height above the baseline. Empty omits it.
 * - <b>Depth</b>, string — the reported depth below the baseline. Empty omits it.
 * - <b>LSpace</b>, string — horizontal offset of the content. Empty omits it.
 * - <b>VOffset</b>, string — vertical offset of the content. Empty omits it.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMpadded extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mpadded';
	}

	/**
	 * @return string the reported width. Defaults to '' (no attribute).
	 */
	public function getWidth()
	{
		return $this->getViewState('Width', '');
	}

	/**
	 * @param string $value the reported width (a MathML length), rendered as the `width` attribute
	 */
	public function setWidth($value)
	{
		$this->setViewState('Width', $value, '');
	}

	/**
	 * @return string the reported height. Defaults to '' (no attribute).
	 */
	public function getHeight()
	{
		return $this->getViewState('Height', '');
	}

	/**
	 * @param string $value the reported height (a MathML length), rendered as the `height` attribute
	 */
	public function setHeight($value)
	{
		$this->setViewState('Height', $value, '');
	}

	/**
	 * @return string the reported depth. Defaults to '' (no attribute).
	 */
	public function getDepth()
	{
		return $this->getViewState('Depth', '');
	}

	/**
	 * @param string $value the reported depth (a MathML length), rendered as the `depth` attribute
	 */
	public function setDepth($value)
	{
		$this->setViewState('Depth', $value, '');
	}

	/**
	 * @return string the horizontal offset of the content. Defaults to '' (no attribute).
	 */
	public function getLSpace()
	{
		return $this->getViewState('LSpace', '');
	}

	/**
	 * @param string $value the horizontal offset (a MathML length), rendered as the `lspace` attribute
	 */
	public function setLSpace($value)
	{
		$this->setViewState('LSpace', $value, '');
	}

	/**
	 * @return string the vertical offset of the content. Defaults to '' (no attribute).
	 */
	public function getVOffset()
	{
		return $this->getViewState('VOffset', '');
	}

	/**
	 * @param string $value the vertical offset (a MathML length), rendered as the `voffset` attribute
	 */
	public function setVOffset($value)
	{
		$this->setViewState('VOffset', $value, '');
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
		$this->addStringAttribute($writer, 'lspace', $this->getLSpace());
		$this->addStringAttribute($writer, 'voffset', $this->getVOffset());
	}
}
