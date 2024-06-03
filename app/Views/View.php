<?php 

namespace Views;

use Exception;

class View
{
    private $templatePath;
    private $data;

    public function __construct($templatePath, $data = [])
    {
        $this->templatePath = __DIR__ . "/" . $templatePath;
        $this->data = $data;
    }

    public function render()
    {
        if (!file_exists($this->templatePath)) {
            throw new Exception("Template file not found: $this->templatePath");
        }

        extract($this->data); // Extract data for template access
        include $this->templatePath;
    }
}