<?php
/*
 * Require Theme Config Files
 */
class ThemeApp
{
    public function __construct($dir, $depth = 0)
    {
        $scan = glob($dir . '/*');
        foreach ($scan as $path) {
            if (preg_match('/\.php$/', $path)) {
                require_once $path;
            } elseif (is_dir($path)) {
                $this->__construct($path, $depth + 1);
            }
        }
    }
}

new ThemeApp(get_template_directory() . '/app');
