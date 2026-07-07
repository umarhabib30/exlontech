<?php

if (! function_exists('public_asset')) {
    /**
     * Root-relative URL for files in /public. Always loads from the current domain.
     */
    function public_asset(string $path): string
    {
        return '/' . ltrim($path, '/');
    }
}
