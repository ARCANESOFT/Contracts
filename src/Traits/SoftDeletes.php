<?php namespace Arcanesoft\Contracts\Traits;

/**
 * Interface  SoftDeletes
 *
 * @package   Arcanesoft\Contracts\Auth\Traits
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface SoftDeletes
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    /**
     * Force a hard delete on a soft deleted model.
     *
     * @return bool|null
     */
    public function forceDelete();

    /**
     * Restore a soft-deleted model instance.
     *
     * @return bool|null
     */
    public function restore();

    /**
     * Determine if the model instance has been soft-deleted.
     *
     * @return bool
     */
    public function trashed();

    /**
     * Determine if the model is currently force deleting.
     *
     * @return bool
     */
    public function isForceDeleting();
}
