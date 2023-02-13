<?php
class Vacation implements JsonSerializable {

  public function jsonSerialize() : mixed {
      return get_object_vars($this);
  }

  private $id;
  private $userId;
  private $plannedHours;
  private $startDate;
  private $endDate;
  private $name;


  /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
/**
     * Get the value of userId
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
     /**
     * Get the value of plannedHours
     *
     * @return float
     */
    public function getPlannedHours(): float
    {
        return $this->plannedHours;
    }

    /**
     * Set the value of plannedHours
     *
     * @param float $plannedHours
     *
     * @return self
     */
    public function setPlannedHours(float $plannedHours): self
    {
        $this->plannedHours = $plannedHours;

        return $this;
    }
    /**
     * Get the value of startDate
     *
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @param string $startDate
     *
     * @return self
     */
    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }
 /**
     * Get the value of endDate
     *
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @param string $endDate
     *
     * @return self
     */
    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
     
}
?>