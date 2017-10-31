<?php

namespace PouleR\DeezerAPI\Tests;

use PHPUnit\Framework\TestCase;
use PouleR\DeezerAPI\DeezerAPI;
use PouleR\DeezerAPI\DeezerAPIClient;

/**
 * Class DeezerAPITest
 */
class DeezerAPITest extends TestCase
{
    /**
     * @var DeezerAPIClient|\PHPUnit_Framework_MockObject_MockObject
     */
    private $client;

    /**
     * @var DeezerAPI
     */
    private $deezerApi;

    /**
     *
     */
    public function setUp()
    {
        $this->client = $this->createMock(DeezerAPIClient::class);
        $this->deezerApi = new DeezerAPI($this->client);
    }

    /**
     *
     */
    public function testUserInformation()
    {
        $this->client->expects(static::once())
            ->method('apiRequest')
            ->with('GET', 'user/me')
            ->willReturn('{"name": "test"}');

        self::assertEquals('{"name": "test"}', $this->deezerApi->getUserInformation());
    }

    /**
     *
     */
    public function testPermissions()
    {
        $this->client->expects(static::once())
            ->method('apiRequest')
            ->with('GET', 'user/me/permissions')
            ->willReturn('{"permissions":{"basic_access":true}}');

        self::assertEquals('{"permissions":{"basic_access":true}}', $this->deezerApi->getPermissions());
    }

    /**
     *
     */
    public function testMyPlaylists()
    {
        $this->client->expects(static::once())
            ->method('apiRequest')
            ->with('GET', 'user/me/playlists')
            ->willReturn('{}');

        self::assertEquals('{}', $this->deezerApi->getMyPlaylists());
    }

    /**
     *
     */
    public function testMyAlbums()
    {
        $this->client->expects(static::once())
            ->method('apiRequest')
            ->with('GET', 'user/me/albums')
            ->willReturn('{"data":[]}');

        self::assertEquals('{"data":[]}', $this->deezerApi->getMyAlbums());
    }
}
