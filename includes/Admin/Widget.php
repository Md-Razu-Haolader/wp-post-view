<?php

declare(strict_types=1);

namespace MRH\WPPostView\Admin;

class Widget
{

    public function __construct()
    {
        new Widgets\LatestPost();
    }
}
