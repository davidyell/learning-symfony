<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
#[ORM\Table(name: 'employees')]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'EmployeeId')]
    private ?int $employeeId;

    #[ORM\Column(name: 'LastName')]
    private string $lastName;

    #[ORM\Column(name: 'FirstName')]
    private string $firstName;

    #[ORM\Column(name: 'Title')]
    private ?string $title = null;

    /**
     * @var Employee[] $directReports
     */
    #[ORM\OneToMany(targetEntity: Employee::class, mappedBy: 'reportsTo')]
    private Collection $directReports;

    #[ORM\ManyToOne(targetEntity: Employee::class, inversedBy: 'directReports')]
    #[ORM\JoinColumn(name: 'ReportsTo', referencedColumnName: 'EmployeeId')]
    private ?Employee $reportsTo = null;

    #[ORM\Column(name: 'BirthDate')]
    private ?\DateTimeImmutable $birthDate = null;

    #[ORM\Column(name: 'HireDate')]
    private ?\DateTimeImmutable $hireDate = null;

    #[ORM\Column(name: 'Address')]
    private ?string $address = null;

    #[ORM\Column(name: 'City')]
    private ?string $city = null;

    #[ORM\Column(name: 'State')]
    private ?string $state = null;

    #[ORM\Column(name: 'Country')]
    private ?string $country = null;

    #[ORM\Column(name: 'PostalCode')]
    private ?string $postalCode = null;

    #[ORM\Column(name: 'Phone')]
    private ?string $telephone = null;

    #[ORM\Column(name: 'Fax')]
    private ?string $fax = null;

    #[ORM\Column(name: 'Email')]
    private ?string $email = null;

    /**
     * @return int|null
     */
    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    /**
     * @param int|null $id
     * @return Employee
     */
    public function setEmployeeId(?int $employeeId): Employee
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Employee
     */
    public function setLastName(string $lastName): Employee
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName(string $firstName): Employee
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Employee
     */
    public function setTitle(?string $title): Employee
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Employee|null
     */
    public function getReportsTo(): ?Employee
    {
        return $this->reportsTo;
    }

    /**
     * @param Employee|null $reportsTo
     * @return Employee
     */
    public function setReportsTo(?Employee $reportsTo): Employee
    {
        $this->reportsTo = $reportsTo;
        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getDirectReports(): Collection
    {
        return $this->directReports;
    }

    /**
     * @param Collection<int, Employee> $directReports
     * @return Employee
     */
    public function setDirectReports(Collection $directReports): Employee
    {
        $this->directReports = $directReports;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTimeImmutable|null $birthDate
     * @return Employee
     */
    public function setBirthDate(?\DateTimeImmutable $birthDate): Employee
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getHireDate(): ?\DateTimeImmutable
    {
        return $this->hireDate;
    }

    /**
     * @param \DateTimeImmutable|null $hireDate
     * @return Employee
     */
    public function setHireDate(?\DateTimeImmutable $hireDate): Employee
    {
        $this->hireDate = $hireDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return Employee
     */
    public function setAddress(?string $address): Employee
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Employee
     */
    public function setCity(?string $city): Employee
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Employee
     */
    public function setState(?string $state): Employee
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     * @return Employee
     */
    public function setCountry(?string $country): Employee
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     * @return Employee
     */
    public function setPostalCode(?string $postalCode): Employee
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     * @return Employee
     */
    public function setTelephone(?string $telephone): Employee
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return Employee
     */
    public function setFax(?string $fax): Employee
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Employee
     */
    public function setEmail(?string $email): Employee
    {
        $this->email = $email;
        return $this;
    }
}
