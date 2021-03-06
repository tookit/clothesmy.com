<?php


namespace App\Lib;

use Michaelwang\Mediable\UrlGenerators\BaseUrlGenerator;
use Michaelwang\Mediable\Exceptions\MediaUrlException;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;

class OssUrlGenerator extends BaseUrlGenerator
{
    /**
     * Filesystem Manager.
     * @var \Illuminate\Filesystem\FilesystemManager
     */
    protected $filesystem;

    /**
     * Constructor.
     * @param \Illuminate\Contracts\Config\Repository  $config
     * @param \Illuminate\Filesystem\FilesystemManager $filesystem
     */
    public function __construct(Config $config, FilesystemManager $filesystem)
    {
        parent::__construct($config);
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function getAbsolutePath(): string
    {
        return $this->getUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): string
    {
        if (! $this->isPubliclyAccessible()) {
            throw MediaUrlException::cloudMediaNotPubliclyAccessible($this->media->disk);
        }

        return $this->filesystem->disk($this->media->disk)->url($this->media->getDiskPath());
    }

    public function isPubliclyAccessible(): bool
    {
        return true;
    }
}
