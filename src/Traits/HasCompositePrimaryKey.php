<?php

namespace Bios2000\Traits;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasCompositePrimaryKey
 * @mixin Eloquent
 */
trait HasCompositePrimaryKey
{
    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey()
    {
        $keys = $this->getKeyName();

        if (! is_array($keys)) {
            return parent::getKey();
        }

        $keyValues = [];
        foreach ($keys as $key) {
            $val = $this->getAttribute($key);
            if ($val !== null && $val !== '') {
                $keyValues[] = $val;
            }
        }

        return count($keyValues) > 0 ? implode('-', $keyValues) : null;
    }

    /**
     * Set the keys for a save update query.
     *
     * @param mixed $query
     * @return Builder
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
