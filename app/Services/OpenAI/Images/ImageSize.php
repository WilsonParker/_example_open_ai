<?php

namespace App\Services\OpenAI\Images;

enum ImageSize: string
{
    case s256 = '256x256';
    case s512 = '512x512';
    case s1024 = '1024x1024';
}
