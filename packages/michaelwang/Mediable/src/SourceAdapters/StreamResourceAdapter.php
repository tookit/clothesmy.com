<?php
declare(strict_types=1);

namespace Michaelwang\Mediable\SourceAdapters;

use Michaelwang\Mediable\Exceptions\MediaUpload\ConfigurationException;
use Michaelwang\Mediable\Stream;

/**
 * Stream resource Adapter.
 *
 * Adapts a stream resource.
 */
class StreamResourceAdapter extends StreamAdapter
{
    /**
     * The resource.
     * @var resource|null
     */
    protected $resource;

    /**
     * Constructor.
     * @param resource $source
     * @throws ConfigurationException
     */
    public function __construct($source)
    {
        if (!is_resource($source) || get_resource_type($source) !== 'stream') {
            throw ConfigurationException::unrecognizedSource($source);
        }

        parent::__construct(new Stream($source));

        $this->resource = $source;
    }

    /**
     * {@inheritdoc}
     */
    public function getSource()
    {
        return $this->resource;
    }

    /**
     * @inheritdoc
     */
    public function getStreamResource()
    {
        return $this->resource;
    }
}
