<?php

require_once __DIR__ . '/BaseServeDriver.php';

class VueServeValetDriver extends BaseServeDriver
{
    protected function getRunner() {
        return 'yarn serve --port %s';
    }

    protected function getStaticFolder()
    {
        return 'public';
    }

    protected function getDevDependency()
    {
        return '@vue/cli-service';
    }

    protected function filterDevContent($content)
    {
        return str_replace('/app.js', "//{$this->devServerHost}:{$this->port}/app.js", $content);
    }
}