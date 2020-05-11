<?php

namespace Bios2000\Tests;

abstract class TestCase extends \Tests\TestCase
{

    /**
     * Assert that an array has all keys
     *
     * @param array $keys
     * @param array $array
     * @param string $message
     */
    protected function assertArrayHasKeys(array $keys, array $array, string $message = ''): void
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $array, $message);
        }
    }

    /**
     * Assert that a models has all given columns
     *
     * @param array $columns
     * @param string $model
     */
    protected function assertModelHasColumns(array $columns, string $model): void
    {
        $array = (new $model())->firstOrFail()->toArray();

        $this->assertArrayHasKeys($columns, $array, 'Failed asserting that model \''.$model.'\' has all columns.');
    }
}
