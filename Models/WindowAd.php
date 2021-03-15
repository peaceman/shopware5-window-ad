<?php

namespace n2305WindowAd\Models;

use DateTimeImmutable;
use DateTimeInterface;
use Shopware\Components\Model\ModelEntity;
use Shopware\Models\Article\Detail;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Shopware\Models\ProductStream\ProductStream;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="WindowAdRepo")
 * @ORM\Table(name="n2305_window_ads")
 * @ORM\HasLifecycleCallbacks
 */
class WindowAd extends ModelEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="url_slug", type="string", nullable=false, unique=true)
     */
    private $urlSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="slider_item_min_width", type="integer", options={"default": 640})
     */
    private $sliderItemMinWidth;

    /**
     * @var int
     *
     * @ORM\Column(name="product_stream_id", type="integer")
     */
    protected $productStreamId;

    /**
     * @var ProductStream
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     *
     * @ORM\ManyToOne(targetEntity="Shopware\Models\ProductStream\ProductStream")
     * @ORM\JoinColumn(name="product_stream_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $productStream;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrlSlug(): string
    {
        return $this->urlSlug;
    }

    public function setUrlSlug(string $urlSlug): self
    {
        $this->urlSlug = $urlSlug;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSliderItemMinWidth(): int
    {
        return $this->sliderItemMinWidth;
    }

    public function setSliderItemMinWidth(int $sliderItemMinWidth): self
    {
        $this->sliderItemMinWidth = $sliderItemMinWidth;

        return $this;
    }

    /**
     * @return ProductStream
     */
    public function getProductStream()
    {
        return $this->productStream;
    }

    /**
     * @param ProductStream $productStream
     * @return $this
     */
    public function setProductStream($productStream): self
    {
        $this->productStream = $productStream;

        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }
}
