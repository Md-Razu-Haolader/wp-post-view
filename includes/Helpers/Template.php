<?php

declare(strict_types=1);

namespace MRH\WPPostView\Helpers;

class Template
{
    public static function render(string $filePath, $data = [])
    {
        $filePath = WPPV_VIEWS . '/' . $filePath;
        if (file_exists($filePath)) {
            extract($data);
            require_once $filePath;
        } else {
            throw new \RuntimeException('View file not found');
        }
    }
}
