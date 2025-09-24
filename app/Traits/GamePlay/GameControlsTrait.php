<?php

namespace App\Traits\GamePlay;

trait GameControlsTrait
{
    /**
     * @var bool A property to track the state of the game controls.
     */
    public bool $controlsEnabled = FALSE;

    /**
     * Enables the game controls.
     */
    public function enableControls(): self
    {
        $this->controlsEnabled = TRUE;
        return $this;
    }

    /**
     * Disables the game controls.
     */
    public function disableControls(): self
    {
        $this->controlsEnabled = FALSE;
        return $this;
    }

    /**
     * Checks if the game controls are currently enabled.
     *
     * @return bool True if controls are enabled, false otherwise.
     */
    public function areControlsEnabled(): bool
    {
        return $this->controlsEnabled;
    }
}
