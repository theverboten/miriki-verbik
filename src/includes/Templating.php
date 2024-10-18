<?php

class Templating
{
    public $class_prefix;
    public $context = array();

    // Construct
    public function __construct($class_prefix = null)
    {
        $this->class_prefix = $class_prefix;
    }


    // Get context
    public function getContext($key, $default = null)
    {
        if (!isset($this->context[$key])) {
            return $default;
        }

        return $this->context[$key];
    }

    // Get parent context
    public function getParentContext($key, $default = null)
    {
        if (!isset($this->context['_context'][$key])) {
            return $default;
        }

        return $this->context['_context'][$key];
    }


    // Process HTML
    public function getHtml($path)
    {
        ob_start();

        extract($this->context);

        require $path;
        $_html = ob_get_contents();

        // Set top level css class
        if ($this->context['class']) {
            $_html = preg_replace('/(class="[^"]*)/', '$1 ' . $this->context['class'], $_html, 1);
        }

        ob_end_clean();

        // Prefix css classes
        if ($this->class_prefix) {
            $_html = $this->prefixCssClasses($_html);
        }

        return $_html;
    }

    // Prefix css classes
    public function prefixCssClasses($html)
    {
        $dom = new DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new DomXpath($dom);

        $res = $xpath->query('//@class|//@id');
        foreach ($res as $attr) {
            $value = explode(' ', $attr->value);
            foreach ($value as &$set) {
                if (strpos($set, $this->class_prefix) !== 0) {
                    $set = $this->class_prefix . trim($set);
                }
            }
            unset($set);
            $attr->value = implode(' ', $value);
        }
        $saved_dom = trim($dom->saveHTML());
        $start_dom = stripos($saved_dom, '<body>') + 6;
        $html      = substr($saved_dom, $start_dom, strripos($saved_dom, '</body>') - $start_dom);
        $html      = html_entity_decode($html);

        return $html;
    }

    // Include view
    public function getTemplate(string $path, array $args = array()): string
    {
        // Check if file exists
        if (!file_exists($path)) {
            trigger_error('File "' . $path . '" doesn\'t exist.', E_USER_ERROR);
            die();
        }

        // Set context if provided
        $parent_context = $this->context;

        if ($args) {
            $this->context = (array) $args;

            if ($parent_context) {
                $this->context['_context'] = $parent_context;
            }
        }

        // Process html
        @$html = $this->getHtml($path);

        // Empty context / set it's original state
        if ($parent_context) {
            $this->context = $parent_context;
        } else {
            $this->context = array();
        }

        return $html . PHP_EOL;
    }
}
