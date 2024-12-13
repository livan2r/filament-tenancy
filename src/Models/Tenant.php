<?php

namespace TomatoPHP\FilamentTenancy\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use TomatoPHP\FilamentTenancy\Models\SocialAuth;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends \Stancl\Tenancy\Database\Models\Tenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected static string $centralDB;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'password',
        'otp_code',
        'otp_code_active_at',
        'is_active',
        'type',
        'data',
    ];

    protected $casts = [
        'data' => 'json',
        'is_active' => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'password',
            'otp_code',
            'otp_code_active_at',
            'is_active',
            'type',
            'data',
        ];
    }

    /**
     * @return HasMany
     */
    public function social(): HasMany
    {
        return $this->hasMany(SocialAuth::class, 'tenant_id', 'id');
    }

    /**
     * Set up the tenant database.
     *
     * @param bool $on
     *
     * @return void
     */
    public function setup(bool $on = true): void
    {
        self::setDB($on, $this->id);
    }

    /**
     * Set the tenant database.
     *
     * @param bool $on
     * @param string|null $tenantId
     *
     * @return void
     * @see https://tenancyforlaravel.com/docs/v3/early-identification/#early-identification
     */
    static function setDB(bool $on=true, string $tenantId=null): void
    {
        if (!$on && !empty(self::$centralDB)) {
            config(['database.connections.dynamic.database' => self::$centralDB]);
            DB::purge('dynamic');
            DB::connection('dynamic')->getPdo();
            return;
        }

        if (!empty(tenant())) {
            return;
        }

        if (empty($tenantId)) {
            $host = request()->host();
            if ($host === config('filament-tenancy.central_domain')) {
                return;
            }
        }

        $tenantId = $tenantId ?? explode('.', $host)[0];
        $record = DB::table('tenants')
            ->where('id', $tenantId)
            ->first();
        if (empty($record)) {
            return;
        }

        self::$centralDB = config('database.connections.dynamic.database');
        $dbName = config('tenancy.database.prefix') . $record->id . config('tenancy.database.suffix');
        config(['database.connections.dynamic.database' => $dbName]);
        DB::purge('dynamic');

        DB::connection('dynamic')->getPdo();
    }
}
