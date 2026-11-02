<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * 랜딩(루트) 페이지 SEO/GEO 피처 테스트
 *
 * @internal
 */
final class WebLandingFeatureTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private function rawBody(string $uri): string
    {
        return (string) $this->get($uri)->response()->getBody();
    }

    public function testRootServesLandingNotLoginRedirect(): void
    {
        $result = $this->get('/');
        $result->assertStatus(200);
        $result->assertSee('AICura');
    }

    public function testLandingHasSeoMetaAndStructuredData(): void
    {
        $body = $this->rawBody('/');

        $this->assertStringContainsString('<link rel="canonical"', $body);
        $this->assertStringContainsString('name="description"', $body);
        $this->assertStringContainsString('property="og:title"', $body);
        $this->assertStringContainsString('"@type": "Organization"', $body);
        $this->assertStringContainsString('"@type": "WebSite"', $body);
        $this->assertStringContainsString('"@type": "FAQPage"', $body);
        $this->assertStringContainsString('<h1>', $body);
    }
}
