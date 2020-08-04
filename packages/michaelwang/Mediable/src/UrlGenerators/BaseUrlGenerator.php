<?php
declare(strict_types=1);

namespace Michaelwang\Mediable\UrlGenerators;

use Illuminate\Contracts\Config\Repository as Config;
use Michaelwang\Mediable\Media;

abstract class BaseUrlGenerator implements UrlGeneratorInterface
{
    /**
     * Configuration Repository.
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * Media instance being linked.
     * @var \Michaelwang\Mediable\Media
     */
    protected $media;

    /**
     * Constructor.
     * @param \Illuminate\Contracts\Config\Repository $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Set the media being operated on.
     * @param \Michaelwang\Mediable\Media $media
     */
    public function setMedia(Media $media): void
    {
        $this->media = $media;
    }

    /**
     * {@inheritdoc}
     */
    public function isPubliclyAccessible(): bool
    {
        return $this->getDiskConfig('visibility', 'private') == 'public' && $this->media->isVisible();
    }

    /**
     * Get a config value for the current disk.
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    protected function getDiskConfig(string $key, $default = null)
    {
        return $this->config->get("filesystems.disks.{$this->media->disk}.{$key}", $default);
    }
}
