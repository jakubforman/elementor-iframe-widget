<?php

namespace jayjay666\ElementorIframeWidget\Widgets;

use Elementor\Widget_Base;

class ElementorIframeWidget extends Widget_Base
{
    public function get_name()
    {
        return 'iframe';
    }

    public function get_title()
    {
        return 'iframe';
    }

    /**
     * Nastavím ikonu Widgetu
     *
     * Všechny dostupné ikony na: https://elementor.github.io/elementor-icons/
     *
     * @return string
     */
    public function get_icon()
    {
        return 'eicon-frame-expand';
    }

    public function get_categories()
    {
        return ['jays-developer-booster'];
    }


    protected function _register_controls()
    {
        // TODO: přidat všechny atributy možné z https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
        //  Přidápadně do stylu

        // Content section
        $this->registerContentControls();

        // Style section
        $this->registerStyleControls();
    }

    /**
     * Rendering final HTML
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (isset($settings['url'])) {
            $url = isset($settings['url']['url']) ? $settings['url']['url'] : $settings['url'];
            $title = $settings['title'];
            echo "<iframe src=\"$url\" title='$title' style=\"border:0px #ffffff none;\" name=\"myiFrame\" allowfullscreen></iframe>";
        }
    }

    protected function _content_template()
    {
    }

    /**
     * Registruje ovladací prvky style tabu
     */
    protected function registerStyleControls()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Size', 'elementor-iframe-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Height
        $this->add_responsive_control(
            'iframe-height',
            [
                'label' => __('Height', 'elementor-iframe-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vw', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 400,
                ],
                'show_label' => true,
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Width
        $this->add_responsive_control(
            'iframe-width',
            [
                'label' => __('Width', 'elementor-iframe-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'separator' => 'after',
                'size_units' => ['px', 'vw', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 600,
                ],
                'show_label' => true,
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Registruje ovládací prvky content tabu
     */
    protected function registerContentControls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'elementor-iframe-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // URL atribute
        $this->add_control(
            'url',
            [
                'label' => __('URL to embed', 'elementor-iframe-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'input_type' => 'url',
                'placeholder' => __('https://your-link.com', 'elementor-iframe-widget'),
            ]
        );

        // Title attribute
        $this->add_control(
            'title',
            [
                'label' => __('Title attribute', 'elementor-iframe-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'input_type' => 'text',
                'placeholder' => __('My iframe page of somtehing', 'elementor-iframe-widget'),
            ]
        );


        $this->end_controls_section();
    }
}