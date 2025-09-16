<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Tests\Api\PackageApi;

use PHPUnit\Framework\TestCase;
use SandwaveIo\BaseKit\Tests\Helpers\MockedClientFactory;

final class ListUserPackageTest extends TestCase
{
    public function testListUserPackage(): void
    {
        $client = MockedClientFactory::makeSdk(
            200,
            (string) file_get_contents(__DIR__ . '/../data/user-packages-get.json'),
            MockedClientFactory::assertRoute('GET', '/users/12345/account-packages')
        );

        $userPackages = $client->packageApi->listUserPackages(12345);
    }
}
