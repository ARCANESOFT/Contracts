<?php namespace Arcanesoft\Contracts\Auth\Models;

use Arcanesoft\Contracts\Auth\Traits\Roleable;

/**
 * Interface  Permission
 *
 * @package   Arcanesoft\Contracts\Auth\Models
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  int             id
 * @property  int             group_id
 * @property  string          name
 * @property  string          slug
 * @property  string          description
 * @property  \Carbon\Carbon  created_at
 * @property  \Carbon\Carbon  updated_at
 *
 * @property  \Arcanesoft\Contracts\Auth\Models\PermissionsGroup  group
 */
interface Permission extends Roleable, Model
{
    /* -----------------------------------------------------------------
     |  Relationships
     | -----------------------------------------------------------------
     */
    /**
     * Permission Group Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group();

    /* -----------------------------------------------------------------
     |  Check Functions
     | -----------------------------------------------------------------
     */
    /**
     * Check if the permission has the same slug.
     *
     * @param  string  $slug
     *
     * @return bool
     */
    public function hasSlug($slug);
}
