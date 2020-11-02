<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\SuperClient
 */
final class SuperClient extends Client
{
    const ID = 1;

    public $table = 'clients';

    /**
     * Get the instance of super client
     *
     * @return self
     */
    public static function instance()
    {
        return self::find(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function openCourses(int $projectId): Collection
    {
        return Product::query()
            ->whereIn('type', Product::visibleProductTypes())
            ->where('project_id', $projectId)
            ->get();
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'client_id');
    }

    /**
     * @inheritDoc
     */
    public function hasProduct($productId): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isActive(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function projectMatch($subdomain): bool
    {
        return true;
    }
}
