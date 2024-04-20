<?php

namespace Untek\Framework\Telegram\Infrastructure\Normalizer;

use ArrayObject;
use Untek\Core\Contract\Common\Exceptions\NotImplementedMethodException;
use Untek\Core\Instance\Helpers\MappingHelper;
use Untek\Database\Base\Hydrator\DatabaseItemNormalizer;
use Untek\Framework\Telegram\Domain\Dto\Photo;
use Untek\Framework\Telegram\Domain\Dto\SendPhotoResult;

class SendPhotoResultNormalizer extends DatabaseItemNormalizer
{

    public function normalize(mixed $entity, string $format = null, array $context = []): float|array|ArrayObject|bool|int|string|null
    {
        throw new NotImplementedMethodException();
    }

    public function denormalize(mixed $item, string $type, string $format = null, array $context = [])
    {
        $photo = $item['photo'];
        unset($item['photo']);
        unset($item['caption_entities']);
        $photoObjects = [];
        foreach ($photo as $photoItem) {
            $photoObjects[] = MappingHelper::restoreObject($photoItem, Photo::class);
        }
        /** @var SendPhotoResult $dto */
        $dto = MappingHelper::restoreObject($item, SendPhotoResult::class);
        $dto->setPhoto($photoObjects);
        return $dto;
    }
}