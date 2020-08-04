<?php
declare(strict_types=1);

namespace Michaelwang\Mediable\Exceptions\MediaUpload;

use Michaelwang\Mediable\Exceptions\MediaUploadException;

class ForbiddenException extends MediaUploadException
{
    public static function diskNotAllowed(string $disk): self
    {
        return new static("The disk `{$disk}` is not in the allowed disks for media.");
    }
}
