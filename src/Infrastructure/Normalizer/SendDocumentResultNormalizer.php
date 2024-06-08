<?php

namespace Untek\Framework\Telegram\Infrastructure\Normalizer;

use ArrayObject;
use Untek\Core\Arr\Helpers\ArrayHelper;
use Untek\Core\Contract\Common\Exceptions\NotImplementedMethodException;
use Untek\Core\Instance\Helpers\MappingHelper;
use Untek\Database\Base\Hydrator\DatabaseItemNormalizer;
use Untek\Framework\Telegram\Domain\Dto\SendDocumentResult;

class SendDocumentResultNormalizer extends DatabaseItemNormalizer
{

    public function normalize(mixed $entity, string $format = null, array $context = []): float|array|ArrayObject|bool|int|string|null
    {
        throw new NotImplementedMethodException();
    }

    public function denormalize(mixed $item, string $type, string $format = null, array $context = [])
    {
//        unset($item['caption_entities']);
//        unset($item['all_members_are_administrators']);

        $item = ArrayHelper::extractByKeys($item, [
            'message_id',
            'caption',
            'date',
            'from',
            'chat',
            'document',
            'caption_entities',
        ]);

        $dto = MappingHelper::restoreObject($item, SendDocumentResult::class);
        return $dto;
    }
}