<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package infinity
 */

include __DIR__ . '/head.php';
?>


<header>


    <!-- Utility Nav -->
    <div class="util-nav bg-lightbluegrey d-none d-lg-flex align-items-center justify-content-end">
        <a href="https://salesportal.treace.com/" target="">
            Sales Portal </a>
    </div>

    <!-- Desktop Nav -->
    <nav class="primary w-100 p-0">
        <div class="nav-left w-100 px-3 d-flex align-items-center">
            <a class="logo mx-auto mx-lg-0" href="/"><img src="/uploads/2021/03/treace-logo-2x.png" alt=""></a>

            <ul class="d-none d-lg-flex">
                <li data-menu-target="0" class="">
                    <a href="https://www.lapiplasty.com/">For Patients</a>


                </li>
                <li data-menu-target="1" class="">
                    <a href="https://www.lapiplasty.com/surgeons">For Surgeons</a>


                </li>
                <li data-menu-target="2" class="has-child">
                    <a href="/about-us/">Company</a>

                    <div class="subnav" data-menu="2">
                        <ul>
                            <li>
                                <a href="/about-us/">About Us</a>
                            </li>
                            <li>
                                <a href="/management/">Management</a>
                            </li>
                            <li>
                                <a href="/board-of-directors/">Board of Directors</a>
                            </li>
                            <li>
                                <a href="/surgeon-advisory-board/">Surgeon Advisory Board</a>
                            </li>
                            <li>
                                <a href="/grants-and-donations/">Grants and Donations</a>
                            </li>
                            <li>
                                <a href="/patents/">Patents</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li>
                    <a href="/careers/">Careers</a>
                </li>
                <li data-menu-target="3" class="has-child">
                    <a href="https://investors.treace.com/">Investors</a>

                    <div class="subnav" data-menu="3">
                        <ul>
                            <li>
                                <a href="https://investors.treace.com/">Overview</a>
                            </li>
                            <li>
                                <a href="https://investors.treace.com/news-events/press-releases">News & Events</a>
                            </li>
                            <li>
                                <a href="https://investors.treace.com/stock-information/stock-quote-chart">Stock
                                    Information</a>
                            </li>
                            <li>
                                <a href="https://investors.treace.com/financial-filings/sec-filings">Financials &
                                    Filings</a>
                            </li>
                            <li>
                                <a href="https://investors.treace.com/corporate-governance/documents-charters">Corporate
                                    Governance</a>
                            </li>
                            <li>
                                <a href="https://investors.treace.com/investor-resources/investor-faqs">Investor
                                    Resources</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li class="close-menu d-lg-none"><a href="#"></a></li>
            </ul>
        </div>

        <!-- Nav Right Buttons  -->
        <div class="nav-right h-100 d-none d-lg-flex">
            <a href="https://www.lapiplasty.com/am-i-a-candidate/" class="btn btn-text text-darkgrey h-100"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19">
                    <path fill="#E53D2E" d="M9.618 10.064c3.1 0 5.754 2.246 6.318 5.319l.023.094c.282 1.584-.94 3.05-2.536 3.05H2.57c-1.573 0-2.795-1.419-2.536-3.003l.044-.24c.61-3.02 3.231-5.22 6.32-5.22zM4.477 1.662c1.915-2.236 5.4-2.223 7.302.082l.138.177c1.282 1.74 1.076 4.153-.49 5.661l-.048.047C9.5 9.426 6.541 9.38 4.71 7.535l-.024-.024c-1.526-1.536-1.667-3.97-.352-5.673z" />
                </svg>
                Am I A Candidate?</a>
            <a href="https://locator.treace.net/" class="btn btn-primary h-100 px-0"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 12 18">
                    <path fill="#FFF" d="M6 .094C2.737.094.094 2.737.094 6c0 2.475 3.393 8.606 5.043 11.419.394.656 1.35.656 1.726 0C8.492 14.606 11.905 8.475 11.905 6 11.906 2.737 9.262.094 6 .094zM6 8.55C4.594 8.55 3.45 7.406 3.45 6S4.594 3.431 6 3.431 8.55 4.575 8.55 6c0 1.406-1.144 2.55-2.55 2.55z" />
                </svg>
                Find A Doctor</a>
        </div>

        <div class="menu-wrap d-lg-none">
            <span></span>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Mobile nav -->
    <div class="mobile-nav bg-lightergrey">
        <ul>
            <li><a href="#" class="mobile-nav-close font-bold">Close <img src="/wp-content/themes/treace/library/dist/images//icon-close.svg" alt=""></a></li>
            <li class="">
                <a class="font-bold" href="http://lapiplasty.com/">For Patients</a>

            </li>
            <li class="">
                <a class="font-bold" href="https://www.lapiplasty.com/surgeons">For Surgeons</a>

            </li>
            <li class="has-child">
                <a class="font-bold" href="/about-us/">Company</a>
                <div class="show-submenu" data-menu-target="2"></div>
                <div class="mobile-subnav" data-menu="2">
                    <ul>
                        <li>
                            <a href="/about-us/">About Us</a>
                        </li>
                        <li>
                            <a href="/management/">Management</a>
                        </li>
                        <li>
                            <a href="/board-of-directors/">Board of Directors</a>
                        </li>
                        <li>
                            <a href="/surgeon-advisory-board/">Surgeon Advisory Board</a>
                        </li>
                        <li>
                            <a href="/grants-and-donations/">Grants and Donations</a>
                        </li>
                        <li>
                            <a href="/patents/">Patents</a>
                        </li>
                    </ul>
                </div>

            </li>
            <li>
                <a class="font-bold" href="/careers/">Careers</a>
            </li>
            <li class="has-child">
                <a class="font-bold" href="https://investors.treace.com/">Investors</a>
                <div class="show-submenu" data-menu-target="3"></div>
                <div class="mobile-subnav" data-menu="3">
                    <ul>
                        <li>
                            <a href="https://investors.treace.com/">Overview</a>
                        </li>
                        <li>
                            <a href="https://investors.treace.com/news-events/press-releases">News & Events</a>
                        </li>
                        <li>
                            <a href="https://investors.treace.com/stock-information/stock-quote-chart">Stock
                                Information</a>
                        </li>
                        <li>
                            <a href="https://investors.treace.com/financial-filings/sec-filings">Financials &
                                Filings</a>
                        </li>
                        <li>
                            <a href="https://investors.treace.com/corporate-governance/documents-charters">Corporate
                                Governance</a>
                        </li>
                        <li>
                            <a href="https://investors.treace.com/investor-resources/investor-faqs">Investor
                                Resources</a>
                        </li>
                    </ul>
                </div>

            </li>
        </ul>

        <!-- Mobile nav util -->
        <ul class="mobile-nav-util patient_mobile_utility_menu">

            <li><a class="util-item" href="https://locator.treace.net/" target=""><img src="/uploads/2020/06/icon-pin-grey.svg"> Find a Doctor</a></li>
            <li><a class="util-item" href="https://www.lapiplasty.com/am-i-a-candidate/" target=""><img src="/uploads/2020/06/icon-user-grey.svg"> Am I A candidate</a></li>
            <li><a class="util-item" href="https://salesportal.treace.com/" target=""><img src="/uploads/2020/06/icon-user-grey.svg" style="opacity:0;"> Sales Portal</a></li>
        </ul>
    </div>

    <!-- Mobile nav red buttons. -->
    <div class="util-nav-mobile d-flex d-lg-none">
        <a href="https://www.lapiplasty.com" class="btn btn-primary h-100">
            For Patients</a>
        <a href="https://www.lapiplasty.com/surgeons" class="btn btn-primary h-100">
            For Surgeons</a>
    </div>
</header>