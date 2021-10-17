<?php

declare(strict_types=1);

namespace amcintosh\FreshBooks;

/**
 * Configuration object for FreshBooks API Client
 */
class ClientConfig
{

    private const DEFAULT_TIMEOUT = 30;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        ?string $clientSecret = null,
        ?string $redirectUri = null,
        ?string $accessToken = null,
        ?string $refreshToken = null,
        ?string $userAgent = null,
        bool $autoRetry = true,
        int $timeout = self::DEFAULT_TIMEOUT
    ) {
        $this->clientSecret = null;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->userAgent = $userAgent;
        $this->autoRetry = $autoRetry;
        $this->timeout = $timeout;
        $this->version = $this->getVersion();
    }

    /**
     * Get the library version.
     *
     * @return string
     */
    private function getVersion(): string
    {
        return file_get_contents(dirname(__FILE__) . '/VERSION');
    }

    /**
     * Get the userAgent for requests. If this is not set, the default will be set and returned.
     *
     * @return string
     */
    public function getUserAgent(): string
    {
        if (is_null($this->userAgent)) {
            $this->userAgent = "FreshBooks php sdk/{$this->version} client_id {$this->clientId}";
        }
        return $this->userAgent;
    }
}