<?php

namespace App\Controllers\Web;

use App\Libraries\Seo\JsonLdBuilder;

/**
 * 랜딩(서비스 소개) 페이지 — 루트 진입점
 *
 * 정적 소개 콘텐츠이므로 DB 조회가 없다. 검색·생성형 엔진이 인용할 수 있도록
 * 사실 진술형 본문 + Organization·WebSite·FAQPage 구조화 데이터를 함께 내보낸다.
 */
class LandingController extends BaseWebController
{
    private const string DESCRIPTION = 'AICura(아이큐라)는 검수 완료된 성형·시술 이벤트와 병원, 실사용 후기, 시술 정보를 '
        . '한곳에서 보여주는 소비자 앱과, 의료광고 심의 사전검사·AI 카피 생성·성과 리포트를 제공하는 '
        . '성형·토탈 광고 솔루션입니다.';

    /**
     * FAQ — 화면 노출 본문과 FAQPage JSON-LD 의 단일 출처
     *
     * @var list<array{q: string, a: string}>
     */
    private const array FAQ = [
        [
            'q' => 'AICura는 어떤 서비스인가요?',
            'a' => 'AICura는 성형·시술 정보를 찾는 소비자에게 검수 완료된 이벤트·병원·후기·가이드를 제공하고, '
                . '병원과 광고 대행사에는 광고 집행·심의 사전검사·성과 관리를 지원하는 AI 기반 광고 솔루션입니다.',
        ],
        [
            'q' => '이벤트와 후기는 어떻게 검증되나요?',
            'a' => '이벤트는 검수가 완료된 건만 공개되고, 의심·신고된 후기는 노출과 검색 색인에서 제외됩니다.',
        ],
        [
            'q' => '의료광고 심의는 어떻게 지원하나요?',
            'a' => '광고 제목과 상세 문구를 의료법 제56조 위반 유형 기준으로 AI가 1차 스크리닝해 위반 가능성을 '
                . '알려줍니다. 최종 심의를 대체하지 않는 사전검사입니다.',
        ],
        [
            'q' => '광고주 계정은 어떻게 만드나요?',
            'a' => '광고주·관리자 계정은 직접 가입하지 않고 대행사가 생성합니다. 광고주 로그인 화면에서 발급받은 계정으로 접속합니다.',
        ],
    ];

    public function index(): string
    {
        $home = base_url('/');

        return $this->render('web/landing', [
            'faq'    => self::FAQ,
            'jsonLd' => [
                JsonLdBuilder::organization($home, base_url('assets/favicon/android-chrome-512x512.png'), self::DESCRIPTION),
                JsonLdBuilder::website($home, self::DESCRIPTION),
                JsonLdBuilder::faqPage(self::FAQ, $home),
            ],
        ], [
            'title'       => 'AICura(아이큐라) — AI 기반 성형·시술 정보 및 토탈 광고 솔루션',
            'description' => self::DESCRIPTION,
            'canonical'   => $home,
            'og_image'    => base_url('assets/favicon/android-chrome-512x512.png'),
        ]);
    }
}
