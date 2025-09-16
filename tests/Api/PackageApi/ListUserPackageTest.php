<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Tests\Api\PackageApi;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use SandwaveIo\BaseKit\Domain\AccountPackage;
use SandwaveIo\BaseKit\Domain\Currency;
use SandwaveIo\BaseKit\Domain\DomainProduct;
use SandwaveIo\BaseKit\Domain\Package;
use SandwaveIo\BaseKit\Domain\PackagePrice;
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

        Assert::assertInstanceOf(AccountPackage::class, $userPackages[0]);
        Assert::assertSame(3, $userPackages[0]->ref);
        Assert::assertInstanceOf(Package::class, $userPackages[0]->package);
        Assert::assertSame('Test Package', $userPackages[0]->package->name);
        Assert::assertInstanceOf(DomainProduct::class, $userPackages[0]->package->domainProduct);
        Assert::assertSame('.com', $userPackages[0]->package->domainProduct->domainSuffix);
        Assert::assertInstanceOf(PackagePrice::class, $userPackages[0]->package->prices[0]);
        Assert::assertSame('10.00', $userPackages[0]->package->prices[0]->price);
        Assert::assertInstanceOf(Currency::class, $userPackages[0]->package->prices[0]->currency);
        Assert::assertSame('US Dollar', $userPackages[0]->package->prices[0]->currency->name);
        Assert::assertSame(0, $userPackages[0]->package->plugins[0]);
    }
}
