<?php

namespace Jcowie\Generators\Compilers;

class TemplateCompiler
{
    public function compile($template, $value)
    {
        foreach ($value as $key => $data) {
            $templateContent = preg_replace("/\\$key\\$/i", $data, file_get_contents(__DIR__ . '/../Templates/' . $template));
        }

        return $templateContent;
    }
}
