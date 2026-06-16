<?php

namespace App\Filter;

use ApiPlatform\Doctrine\Orm\Filter\AbstractFilter;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use App\Entity\JobApplication\JobApplication;
use Doctrine\ORM\QueryBuilder;

final class IsNewFilter extends AbstractFilter
{
    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, Operation $operation = null, array $context = []): void
    {
        if (!in_array($operation->getUriTemplate(), [
            JobApplication::ENDPOINT_COLLECTION_NEW,
            JobApplication::ENDPOINT_COLLECTION_OLD
        ])) {
            return;
        }
        $isNew = $operation->getUriTemplate() === JobApplication::ENDPOINT_COLLECTION_NEW;
        $alias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.isNew = :isNew', $alias));
        $queryBuilder->setParameter('isNew', $isNew);
    }

    public function getDescription(string $resourceClass): array
    {
        return [];
    }
}