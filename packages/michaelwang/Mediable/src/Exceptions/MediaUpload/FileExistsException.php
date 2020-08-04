<?php
declare(strict_types=1);

namespace Michaelwang\Mediable\Exceptions\MediaUpload;

use Michaelwang\Mediable\Exceptions\MediaUploadException;

class FileExistsException extends MediaUploadException
{
    public static function fileExists(string $path): self
    {
        return new static("A file already exists at `{$path}`.");
    }
}
