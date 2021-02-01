<?php

namespace n2305WindowAd\Models;

use DateTimeImmutable;
use Shopware\Components\Model\ModelEntity;
use Shopware\Models\Article\Detail;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Shopware\Models\ProductStream\ProductStream;

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
     * @var ProductStream
     *
     * @ORM\ManyToOne(targetEntity="Shopware\Models\ProductStream\ProductStream")
     * @ORM\JoinColumn(name="product_stream_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $productStream;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetimetz_immutable", nullable=false)
     */
    private $createdAt;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(name="updated_at", type="datetimetz_immutable", nullable=true)
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

    public function getProductStream(): ProductStream
    {
        return $this->productStream;
    }

    public function setProductStream(ProductStream $productStream): self
    {
        $this->productStream = $productStream;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
