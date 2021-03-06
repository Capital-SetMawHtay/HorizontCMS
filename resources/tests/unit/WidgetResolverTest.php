<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WidgetResolverTest extends TestCase
{


    public function testSetterAndGetter(){

    	$widgetResolver = new \App\Libs\ShortCode();

    	$widgetResolver->addWidget('{[TestingWidget]}','WidgetResolved');

    	$this->assertEquals($widgetResolver->getWidget('{[TestingWidget]}'),'WidgetResolved');

    }


    public function testWidgetResolving(){

    	$content = "Some sample text for testing the {[TestingWidget1]} and {[TestingWidget2]} resolving";

    	$widgetResolver = new \App\Libs\ShortCode();

    	$widgetResolver->addWidget('{[TestingWidget1]}','WidgetResolved1');

    	$widgetResolver->addWidget('{[TestingWidget2]}','WidgetResolved2');

    	$resolvedContent = $widgetResolver->compile($content);

    	$this->assertRegexp('/WidgetResolved1/', $resolvedContent);

    	$this->assertRegexp('/WidgetResolved2/', $resolvedContent);
    }


}