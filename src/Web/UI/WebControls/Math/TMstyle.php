<?php

/**
 * TMstyle class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMstyle class
 *
 * TMstyle represents the MathML `<mstyle>` element, which changes the style of the MathML expressions it contains.
 * The default tag is `mstyle`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * It carries no attributes of its own: set the MathML global attributes it shares
 * with every element — {@see TMathElement::setDisplayStyle DisplayStyle},
 * {@see TMathElement::setScriptLevel ScriptLevel},
 * {@see TMathElement::setMathColor MathColor},
 * {@see TMathElement::setMathBackground MathBackground}, and
 * {@see TMathElement::setMathSize MathSize} — and its content inherits them.
 * ```html
 * <com:TMstyle DisplayStyle="true" MathColor="darkblue">
 *     <com:TMi>x</com:TMi>
 * </com:TMstyle>
 * ```
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMstyle extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mstyle';
	}
}
