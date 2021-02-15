<?php


namespace jayjay666\ElementorIframeWidget;


use jayjay666\ElementorIframeWidget\includes\i18n;
use jayjay666\ElementorIframeWidget\includes\JayElementorBooster;
use jayjay666\ElementorIframeWidget\includes\Loader;
use jayjay666\ElementorIframeWidget\includes\RequirementValidator;
use jayjay666\ElementorIframeWidget\Widgets\ElementorIframeWidget;

class Plugin
{
    /**
     * Constructor
     *
     * Loadiging default needs files, class and others
     *
     * @access  public
     * @since   1.0
     */
    public function __construct()
    {
        $this->loadDependencies();
        RequirementValidator::requirementsValidate();
        $this->i18n();
        $this->loadJayElementorBooster();
        $this->loadElementor();
    }

    /**
     * Register all custome Elementor widgets
     */
    public function registerCustomEleWidgets()
    {
        // add Custom iframe widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new ElementorIframeWidget());
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0
     * @access   private
     */
    private function loadDependencies()
    {
        //
        // Pro composer, import composer dependencies
        if (is_readable(__DIR__ . '/../vendor/autoload.php')) {
            require_once __DIR__ . '/../vendor/autoload.php';
        }
    }


    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * @access  public
     * @since   1.0
     */
    public function i18n()
    {
        $plugin_i18n = new i18n();
        Loader::addAction('plugins_loaded', $plugin_i18n, 'LoadPluginTextdomain');
    }

    /**
     * Initialize elementor data
     *
     * Load all elementor data
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @access  public
     * @since   1.0
     */
    public function loadElementor()
    {
        Loader::addAction('elementor/widgets/widgets_registered', $this, 'registerCustomEleWidgets');
    }

    /**
     * Load Jays elementor booster things
     *
     * @access public
     * @since  1.0
     */
    public function loadJayElementorBooster()
    {
        new JayElementorBooster();
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0
     */
    public function run()
    {
        Loader::run();
    }

}