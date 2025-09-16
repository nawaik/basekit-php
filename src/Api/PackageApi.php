<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Api;

use SandwaveIo\BaseKit\Api\Interfaces\PackagesApiInterface;
use SandwaveIo\BaseKit\Domain\AccountPackage;
use SandwaveIo\BaseKit\Exceptions\UnexpectedValueException;

final class PackageApi extends AbstractApi implements PackagesApiInterface
{
    /**
     * @param int $userRef
     * @param int $packageRef
     * @param int $billingFrequency value is in months.
     */
    public function addUserPackage(
        int $userRef,
        int $packageRef,
        int $billingFrequency
    ): void {
        $payload = [
            'packageRef'        => $packageRef,
            'billingFrequency'  => $billingFrequency,
        ];

        $this->client->post("users/{$userRef}/account-packages", $payload);
    }

    /**
     * @param int $userRef
     *
     * @return AccountPackage[]
     */
    public function listUserPackages(int $userRef): array
    {
        $response = $this->client->get("users/{$userRef}/account-packages")->json();
        if (! array_key_exists('accountPackages', $response)) {
            throw new UnexpectedValueException('No account packages was provided by BaseKit.');
        }
        return AccountPackage::fromArray($response['accountPackages']);
    }

    /**
     * @param int $userRef
     * @param int $accountPackageRef
     */
    public function deleteUserPackage(int $userRef, int $accountPackageRef): void
    {
        $this->client->delete("users/{$userRef}/account-packages/{$accountPackageRef}");
    }
}
