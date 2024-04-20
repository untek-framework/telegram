<?php

namespace Untek\Framework\Telegram\Infrastructure\Normalizer;

use ArrayObject;
use Untek\Core\Arr\Helpers\ArrayHelper;
use Untek\Core\Contract\Common\Exceptions\NotImplementedMethodException;
use Untek\Core\Instance\Helpers\MappingHelper;
use Untek\Database\Base\Hydrator\DatabaseItemNormalizer;
use Untek\Framework\Telegram\Domain\Dto\EditMessageResult;

class EditMessageResultNormalizer extends DatabaseItemNormalizer
{

    public function normalize(mixed $entity, string $format = null, array $context = []): float|array|ArrayObject|bool|int|string|null
    {
        throw new NotImplementedMethodException();
    }

    public function denormalize(mixed $item, string $type, string $format = null, array $context = [])
    {
        $item = ArrayHelper::extractByKeys($item, [
            'message_id',
            'text',
            'date',
            'edit_date',
            'from',
            'chat',
//            'forward_from',
//            'forward_date',
        ]);
        /** @var EditMessageResult $dto */
        $dto = MappingHelper::restoreObject($item, EditMessageResult::class);
        return $dto;
    }
}