<?php

namespace Parser\Helper;

class FileLoader
{
    /**
     * @param string $filePath
     * @return string
     * @throws \Exception
     */
    public static function getFileData(string $filePath): string
    {
        $fileData = file_get_contents($filePath);
        if (!$fileData) {
            throw new \Exception('File is empty');
        }

        return $fileData;
    }
}
