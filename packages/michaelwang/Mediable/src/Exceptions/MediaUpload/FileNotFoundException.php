<?php
declare(strict_types=1);

namespace Michaelwang\Mediable\Exceptions\MediaUpload;

use Michaelwang\Mediable\Exceptions\MediaUploadException;

class FileNotFoundException extends MediaUploadException
{
    public static function fileNotFound(string $path): self
    {
        return new static("File `{$path}` does not exist.");
    }
}
