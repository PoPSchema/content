<?php

declare(strict_types=1);

namespace PoP\CustomPosts\TypeResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\AbstractUnionTypeResolver;
use PoP\CustomPosts\FieldInterfaces\CustomPostFieldInterfaceResolver;
use PoP\CustomPosts\TypeDataLoaders\CustomPostUnionTypeDataLoader;

class CustomPostUnionTypeResolver extends AbstractUnionTypeResolver
{
    public const NAME = 'CustomPostUnion';

    public function getTypeName(): string
    {
        return self::NAME;
    }

    public function getSchemaTypeDescription(): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        return $translationAPI->__('Union of \'custom post\' type resolvers', 'content');
    }

    public function getTypeDataLoaderClass(): string
    {
        return CustomPostUnionTypeDataLoader::class;
    }

    public function getSchemaTypeInterfaceClass(): ?string
    {
        return CustomPostFieldInterfaceResolver::class;
    }
}
