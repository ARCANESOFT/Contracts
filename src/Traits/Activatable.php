<?php namespace Arcanesoft\Contracts\Traits;

/**
 * Interface  Activatable
 *
 * @package   Arcanesoft\Contracts\Traits
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Activatable
{
    /* ------------------------------------------------------------------------------------------------
     |  CRUD Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Activate the model.
     *
     * @param  bool  $save
     *
     * @return bool
     */
    public function activate($save = true);

    /**
     * Deactivate the model.
     *
     * @param  bool  $save
     *
     * @return bool
     */
    public function deactivate($save = true);

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the model is active.
     *
     * @return bool
     */
    public function isActive();
}
