<?php


namespace jayjay666\ElementorIframeWidget\includes;


class JayElementorBooster
{

    public function __construct()
    {
        $this->registerBoosterActions();
    }

    /**
     * Add my useful things & functions to elementor
     */
    private function registerBoosterActions()
    {
        Loader::addAction('elementor/elements/categories_registered', $this, 'create_custom_categories');
    }

    function create_custom_categories($elements_manager)
    {

        $elements_manager->add_category(
            'jays-developer-booster',
            [
                'title' => __('Jays Booster', 'elementor-iframe-widget'),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}