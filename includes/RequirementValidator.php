<?php


namespace jayjay666\ElementorIframeWidget\includes;


use jayjay666\WPRequirementsChecker\Validator;

/**
 * Class RequirementValidator
 *
 * Requirements & validator checker for WP & server & plugins
 *
 * @package jayjay666\ElementorIframeWidget\includes
 */
class RequirementValidator
{
    /**
     * Check plugin and server requirements
     */
    static function requirementsValidate()
    {
        // Check requirements
        $validator = new Validator('7.1', 'elementor-iframe-widget/elementor-iframe-widget.php', 'elementor-iframe-widget');
        // $validator = new PluginValidator('7.1', 'section-column-booster/section-column-booster.php',self::DOMAIN);
        $validator->addRequiredPlugin('elementor/elementor.php', '3.0');
        if (!$validator->check()) {
            return;
        }
    }
}