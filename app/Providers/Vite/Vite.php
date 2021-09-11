<?php

namespace App\Providers\Vite;

// Helpers here serve as example. Change to suit your needs.

// For a real-world example check here:
// https://github.com/wp-bond/bond/blob/master/src/Tooling/Vite.php
// https://github.com/wp-bond/boilerplate/tree/master/app/themes/boilerplate

// on the links above there is also example for @vitejs/plugin-legacy
class Vite {

    public function __invoke($entry): string
    {
        return $this->jsTag($entry)
            . $this->jsPreloadImports($entry)
            . $this->cssTag($entry);
    }


// Helpers to print tags

    function jsTag(string $entry): string
    {
        $url = IS_DEVELOPMENT
            ? 'http://localhost:3000/' . $entry
            : $this->assetUrl($entry);

        if (!$url) {
            return '';
        }
        return '<script type="module" crossorigin src="'
            . $url
            . '"></script>';
    }

    function jsPreloadImports(string $entry): string
    {
        if (IS_DEVELOPMENT) {
            return '';
        }

        $res = '';
        foreach ($this->importsUrls($entry) as $url) {
            $res .= '<link rel="modulepreload" href="'
                . $url
                . '">';
        }
        return $res;
    }

    function cssTag(string $entry): string
    {
        // not needed on dev, it's inject by Vite
        if (IS_DEVELOPMENT) {
            return '';
        }

        $tags = '';
        foreach ($this->cssUrls($entry) as $url) {
            $tags .= '<link rel="stylesheet" href="'
                . $url
                . '">';
        }
        return $tags;
    }


// Helpers to locate files

    function getManifest(): array
    {
        $content = file_get_contents(__DIR__ . '/../../../public/manifest.json');

        return json_decode($content, true);
    }

    function assetUrl(string $entry): string
    {
        $manifest = $this->getManifest();

        return isset($manifest[$entry])
            ? '/lumen/public/' . $manifest[$entry]['file']
            : '';
    }

    function importsUrls(string $entry): array
    {
        $urls = [];
        $manifest = $this->getManifest();

        if (!empty($manifest[$entry]['imports'])) {
            foreach ($manifest[$entry]['imports'] as $imports) {
                $urls[] = '/lumen/public/' . $manifest[$imports]['file'];
            }
        }
        return $urls;
    }

    function cssUrls(string $entry): array
    {
        $urls = [];
        $manifest = $this->getManifest();

        if (!empty($manifest[$entry]['css'])) {
            foreach ($manifest[$entry]['css'] as $file) {
                $urls[] = '/lumen/public/' . $file;
            }
        }
        return $urls;
    }
}
