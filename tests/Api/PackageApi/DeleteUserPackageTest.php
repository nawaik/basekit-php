<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Tests\Api\PackageApi;

use PHPUnit\Framework\TestCase;
use SandwaveIo\BaseKit\Tests\Helpers\MockedClientFactory;

final class DeleteUserPackageTest extends TestCase
{
    public function testDeleteUserPackage(): void
    {
        $client = MockedClientFactory::makeSdk(
            204,
            '',
            MockedClientFactory::assertRoute('DELETE', '/users/12345/account-packages/567')
        );

        $client->packageApi->deleteUserPackage(12345, 567);
    }
}
