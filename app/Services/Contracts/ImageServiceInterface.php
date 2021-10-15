<?php

namespace App\Services\Contracts;

interface ImageServiceInterface
{
    public static function upload($image);
    public static function remove($image);
}
