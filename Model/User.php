<?php
class User implements JsonSerializable {

  public function jsonSerialize() : mixed {
      return get_object_vars($this);
  }

  private $id;
  private $email;
  private $groupId;
  private $password;
  private $admin;
  private $vacationHours;
  private $name;
  private $vacationHoursSpent;


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
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of groupId
     *
     * @return int
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * Set the value of groupId
     *
     * @param int $groupId
     *
     * @return self
     */
    public function setGroupId(string $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

     /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
     /**
     * Get the value of admin
     *
     * @return bit
     */
    public function getAdmin(): string
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @param bit $admin
     *
     * @return self
     */
    public function setAdmin(string $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

     /**
     * Get the value of vacationHours
     *
     * @return decimal
     */
    public function getVacationHours(): string
    {
        return $this->vacationHours;
    }

    /**
     * Set the value of vacationHours
     *
     * @param decimal $vacationHours
     *
     * @return self
     */
    public function setVacationHours(string $vacationHours): self
    {
        $this->vacationHours = $vacationHours;

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
    /**
     * Get the value of vacationHoursSpent
     *
     * @return decimal
     */
    public function getVacationHoursSpent(): string
    {
        return $this->vacationHoursSpent;
    }

    /**
     * Set the value of vacationHoursSpent
     *
     * @param decimal $vacationHoursSpent
     *
     * @return self
     */
    public function setVacationHoursSpent(string $vacationHoursSpent): self
    {
        $this->vacationHoursSpent = $vacationHoursSpent;

        return $this;
    }
}
?>