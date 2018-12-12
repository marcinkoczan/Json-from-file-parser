<?php

namespace Parser\Helper;

class UrlValidator
{
    const URL_PATTERN = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

    private $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    /**
     * @return bool
     */
    public function validateUrl(): bool
    {
        return preg_match(self::URL_PATTERN, $this->getUrl());
    }

    /**
     * @return string
     */ 
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return  self
     */ 
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}