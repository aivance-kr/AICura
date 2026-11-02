<?php
/**
 * 랜딩(서비스 소개)
 *
 * @var list<array{q: string, a: string}> $faq
 */
?>
<section class="lp-hero">
    <p class="lp-eyebrow">AI 기반 성형·토탈 광고 솔루션</p>
    <h1>믿고 비교하는 성형·시술 정보,<br>안전하게 집행하는 의료광고</h1>
    <p class="lp-lead">
        AICura(아이큐라)는 검수 완료된 성형·시술 이벤트와 병원, 실사용 후기를 한곳에 모은 소비자 앱과,
        의료광고 심의 사전검사·AI 카피 생성·성과 리포트를 제공하는 광고주용 솔루션입니다.
    </p>
    <div class="lp-actions">
        <a class="lp-btn lp-btn-primary" href="<?= base_url('events') ?>">이벤트 둘러보기</a>
        <a class="lp-btn" href="<?= base_url('portal/login') ?>">광고주 로그인</a>
    </div>
</section>

<section class="lp-section" aria-labelledby="lp-consumer">
    <h2 id="lp-consumer">소비자를 위한 AICura</h2>
    <p class="lp-sub">로그인 없이 둘러보고, 찜·신청·예약할 때만 가입합니다.</p>
    <ul class="lp-grid">
        <li><h3><a href="<?= base_url('events') ?>">성형·시술 이벤트</a></h3><p>검수가 끝난 이벤트만 카테고리·지역별로 보여줍니다.</p></li>
        <li><h3><a href="<?= base_url('hospitals') ?>">병원 찾기</a></h3><p>진료과·지역별 병원 정보와 평점을 비교합니다.</p></li>
        <li><h3><a href="<?= base_url('reviews') ?>">실사용 후기</a></h3><p>실제 이용자 후기를 제공하며 의심·신고된 후기는 제외합니다.</p></li>
        <li><h3><a href="<?= base_url('guides') ?>">시술 정보 가이드</a></h3><p>시술 비용·과정·주의사항을 FAQ와 함께 정리합니다.</p></li>
    </ul>
</section>

<section class="lp-section" aria-labelledby="lp-advertiser">
    <h2 id="lp-advertiser">병원·광고 대행사를 위한 AICura</h2>
    <p class="lp-sub">캠페인 등록부터 리드 관리까지 하나의 포털에서 처리합니다.</p>
    <ul class="lp-grid">
        <li><h3>AI 의료광고 심의 사전검사</h3><p>광고 문구를 의료법 제56조 위반 유형 기준으로 1차 스크리닝합니다.</p></li>
        <li><h3>AI 광고 카피 생성</h3><p>키워드·병원 유형·카테고리로 제목 후보와 상세 문구를 생성합니다.</p></li>
        <li><h3>AI 리드 분석</h3><p>신청 내용과 상담 메모로 전환 가능성과 다음 상담 액션을 제안합니다.</p></li>
        <li><h3>캠페인·성과 리포트</h3><p>캠페인 현황과 광고 성과를 리포트로 확인합니다.</p></li>
    </ul>
</section>

<section class="lp-section" aria-labelledby="lp-faq">
    <h2 id="lp-faq">자주 묻는 질문</h2>
    <dl class="lp-faq">
        <?php foreach ($faq as $item): ?>
            <dt><?= esc($item['q']) ?></dt>
            <dd><?= esc($item['a']) ?></dd>
        <?php endforeach; ?>
    </dl>
</section>
