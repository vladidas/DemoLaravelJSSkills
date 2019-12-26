<?php

namespace App\Data\Models;

use Spatie\MediaLibrary\Models\Media;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class SubDistrict
 * @package App\Data\Models
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SubDistrict extends Model implements HasMedia
{
    use HasMediaTrait, Translatable;

    const MEDIA_IMAGE_COLLECTION = 'sub_districts';
    const MEDIA_IMAGE_DIALOG_THUMB = 'dialog-thumb';
    const MEDIA_IMAGE_DIALOG_THUMB_WIDTH = 150;
    const MEDIA_IMAGE_DIALOG_THUMB_HEIGHT = 150;

    protected $appends = ['href'];

    /**
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'mayor_name',
        'address',
    ];

    /**
     * @var string
     */
    public $translationModel = SubDistrictTranslation::class;

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getMayorName(): string
    {
        return $this->mayor_name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getWebAddress(): string
    {
        return $this->web_address;
    }

    /**
     * @return string|null
     */
    public function getLat(): ?string
    {
        return $this->lat;
    }

    /**
     * @return string|null
     */
    public function getLng(): ?string
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return string|null
     */
    public function getLatLng(): ?string
    {
        if (!$this->getLat() || !$this->getLng()) {
            return null;
        }

        return $this->getLat() . ', ' . $this->getLng();
    }

    /**
     * @return string
     */
    public function getHrefAttribute()
    {
        return route('frontend.sub-districts.show', [
            'id' => $this->getId()
        ]);
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion(self::MEDIA_IMAGE_DIALOG_THUMB)
            ->width(self::MEDIA_IMAGE_DIALOG_THUMB_WIDTH)
            ->height(self::MEDIA_IMAGE_DIALOG_THUMB_HEIGHT)
            ->nonQueued();
    }

    /**
     * @return string
     */
    public function getFirstImageThumbUrl()
    {
        return $this->getFirstMediaUrl(
            self::MEDIA_IMAGE_COLLECTION,
            self::MEDIA_IMAGE_DIALOG_THUMB
        );
    }
}
