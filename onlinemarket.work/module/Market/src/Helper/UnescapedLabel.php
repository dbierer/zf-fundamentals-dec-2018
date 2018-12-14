<?php
namespace Market\Helper;

use Zend\Form\View\Helper\FormLabel;

class UnescapedLabel extends FormLabel
{
    // overrides escaper so that the label contents are returned unescaped
    public function getEscapeHtmlHelper()
    {
        return function ($val) { return $val; };
    }
}
