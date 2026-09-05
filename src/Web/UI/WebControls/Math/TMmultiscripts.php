<?php

/**
 * TMmultiscripts class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/pradosoft/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMmultiscripts class
 *
 * TMmultiscripts represents the MathML `<mmultiscripts>` element, which attaches prescripts and tensor indices to a base expression.
 * The default tag is `mmultiscripts`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMmultiscripts extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mmultiscripts';
	}
}
