<?php

declare( strict_types=1 );

namespace MRH\WPPostView\Helpers;

class Template
{
    public static function render( string $file_path, array $data = [] ): void
    {
        if ( file_exists( $file_path ) ) {
            extract( $data );
            require $file_path;
        } else {
            throw new \RuntimeException( 'View file not found' );
        }
    }
}
