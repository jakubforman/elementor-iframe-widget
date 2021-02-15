<?php


namespace jayjay666\ElementorIframeWidget\includes;

/**
 * Class i18n
 *
 * Loading language taxdomains
 *
 * @package jayjay666\ElementorIframeWidget\includes
 */
class i18n
{
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0
     */
    public function LoadPluginTextdomain()
    {
        load_plugin_textdomain(
            'elementor-iframe-widget',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );

    }
}