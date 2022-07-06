<?php namespace Lovata\MightySeo\Tests\Unit\Models;

include_once __DIR__.'/../../../../toolbox/vendor/autoload.php';
include_once __DIR__.'/../../../../../../tests/PluginTestCase.php';

use PluginTestCase;
use Lovata\MightySeo\Models\SeoTemplate;

/**
 * Class SeoTemplateTest
 * @package Lovata\MightySeo\Tests\Unit\Models
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \PHPUnit\Framework\Assert
 */
class SeoTemplateTest extends PluginTestCase
{
    protected $sModelClass;

    /**
     * SeoTemplateTest constructor.
     */
    public function __construct()
    {
        $this->sModelClass = SeoTemplate::class;
        parent::__construct();
    }

    /**
     * Check model "external" relation config
     */
    public function testHasProductRelation()
    {
        $sErrorMessage = $this->sModelClass.' model has not correct "external" relation config';

        /** @var SeoTemplate $obModel */
        $obModel = new SeoTemplate();
        self::assertNotEmpty($obModel->morphTo, $sErrorMessage);
        self::assertArrayHasKey('external', $obModel->morphTo, $sErrorMessage);
    }
}
