<?php

/**
 * TMathToken class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMathToken class
 *
 * TMathToken is the base for the MathML token elements — those whose content is
 * text rather than other MathML elements: {@see TMi}, {@see TMn}, {@see TMo},
 * {@see TMtext}, and {@see TMs}. It adds the {@see setMathVariant MathVariant}
 * property common to them, which selects the mathematical font style
 * (`normal`, `bold`, `italic`, `bold-italic`, `double-struck`, …). An empty
 * value renders no `mathvariant` attribute.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
abstract class TMathToken extends TMathElement
{
	/**
	 * @return string the mathematical font variant. Defaults to '' (no attribute).
	 */
	public function getMathVariant()
	{
		return $this->getViewState('MathVariant', '');
	}

	/**
	 * Sets the mathematical font variant, rendered as the `mathvariant` attribute.
	 * An empty string renders no attribute.
	 * @param string $value the font variant (e.g. `normal`, `bold`, `italic`)
	 */
	public function setMathVariant($value)
	{
		$this->setViewState('MathVariant', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'mathvariant', $this->getMathVariant());
	}
}
