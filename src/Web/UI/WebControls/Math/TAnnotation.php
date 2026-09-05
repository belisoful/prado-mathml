<?php

/**
 * TAnnotation class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/pradosoft/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TAnnotation class
 *
 * TAnnotation represents the MathML `<annotation>` element, a text annotation
 * inside a {@see TSemantics} element — typically the source form the presentation
 * markup was rendered from, such as a LaTeX or content-MathML string.
 *
 * Properties:
 * - <b>Encoding</b>, string — the encoding of the annotation text (for example
 *   `application/x-tex`). Empty renders no `encoding` attribute.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TAnnotation extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'annotation';
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
