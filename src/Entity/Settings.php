<?php

namespace App\Entity;

use App\Repository\SettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingsRepository::class)
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dist_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $orientation_search;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_min;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_max;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getDistMax(): ?int
    {
        return $this->dist_max;
    }

    public function setDistMax(int $dist_max): self
    {
        $this->dist_max = $dist_max;

        return $this;
    }

    public function getOrientationSearch(): ?int
    {
        return $this->orientation_search;
    }

    public function setOrientationSearch(int $orientation_search): self
    {
        $this->orientation_search = $orientation_search;

        return $this;
    }

    public function getAgeMin(): ?int
    {
        return $this->age_min;
    }

    public function setAgeMin(int $age_min): self
    {
        $this->age_min = $age_min;

        return $this;
    }

    public function getAgeMax(): ?int
    {
        return $this->age_max;
    }

    public function setAgeMax(int $age_max): self
    {
        $this->age_max = $age_max;

        return $this;
    }
}
