<?php

/**
 * TAnnotationXml class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TAnnotationXml class
 *
 * TAnnotationXml represents the MathML `<annotation-xml>` element, an XML annotation
 * inside a {@see TSemantics} element — an alternate XML form of the presentation
 * markup, such as content MathML or OpenMath.
 *
 * Properties:
 * - <b>Encoding</b>, string — the encoding of the annotation (for example
 *   `MathML-Content`). Empty renders no `encoding` attribute.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TAnnotationXml extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'annotation-xml';
	}

	/**
	 * @return string the encoding of the annotation. Defaults to '' (no attribute).
	 */
	public function getEncoding()
	{
		return $this->getViewState('Encoding', '');
	}

	/**
	 * @param string $value the encoding of the annotation, rendered as the `encoding` attribute
	 */
	public function setEncoding($value)
	{
		$this->setViewState('Encoding', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'encoding', $this->getEncoding());
	}
}
