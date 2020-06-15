<?php

declare(strict_types=1);

namespace PoP\CustomPosts\Conditional\RESTAPI\RouteModuleProcessors;

use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\API\Facades\FieldQueryConvertorFacade;

class EntryRouteModuleProcessorHelpers
{
    private static $restFieldsQuery;
    private static $restFields;

    public static function getRESTFields(): array
    {
        if (is_null(self::$restFields)) {
            self::$restFields = self::getRESTFieldsQuery();
            if (is_string(self::$restFields)) {
                self::$restFields = FieldQueryConvertorFacade::getInstance()->convertAPIQuery(self::$restFields);
            }
        }
        return self::$restFields;
    }

    public static function getRESTFieldsQuery(): string
    {
        if (is_null(self::$restFieldsQuery)) {
            self::$restFieldsQuery = (string) HooksAPIFacade::getInstance()->applyFilters(
                'Posts:RESTFields',
                'id|title|date|url|content'
            );
        }
        return self::$restFieldsQuery;
    }
}
