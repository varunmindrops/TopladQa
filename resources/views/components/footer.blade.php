@php
$segment = in_array(
    request()->segment(1),
    App\Models\MstCourse::get()
        ->pluck('value')
        ->toArray(),
)
    ? request()->segment(1)
    : '';
@endphp

<footer class="main_footer" id="footer">
    <div class=" top_foot_rows">
        <div class="container">
            <div class="wrap_footer">
                <div class="row d-flex foot_row">
                    <div class="common_cols_footer">
                        <h2 class="foot_titler">Links</h2>
                        <ul class="list-unstyled">
                            <li><a title="Home" href="/">Home </a>
                            </li>
                            <li><a title="All Faculty" href="/all-faculty">Faculty</a></li>
                            <li><a title="About Us" href="/about-us">About Us</a></li>
                            <li><a title="Scholarship" href="/scholarship">Scholarship</a></li>
                            @if ($segment == '')
                                <li><a title="CMA Blog" href="/blog">Blog</a></li>
                            @elseif($segment == 'cma')
                                <li><a title="CMA Blog" href="/blog"></a></li>
                            @elseif($segment == 'cs')
                                <li><a title="CMA Blog" href="/blog"></a></li>
                            @elseif($segment == 'ca')
                                <li><a title="CMA Blog" href="/blog"></a></li>
                            @endif
                        </ul>
                    </div>

                    @if ($segment == '')
                        <div class="common_cols_footer course_level_links">
                            <ul class="list-unstyled">
                                <li><a title="CMA Courses" href="/cma">

                                        CMA
                                    </a></li>
                                <p>Exclusive Lectures Available for CMA, strictly as per latest pattern.</p>
                                <ul class="social_footers">
                                    <li><a title="You Tube" href="https://www.youtube.com/c/TopLadCMA" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a title="Telegram" href="https://t.me/TopLadCMA" target="_blank"
                                            rel="noopener"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a title="CMA Courses" href="/blog/cma" target="_blank" rel="noopener"> Blog</a>
                                    </li>
                                </ul>

                            </ul>
                        </div>
                        <div class="common_cols_footer section_seprator course_level_links">

                            <ul class="list-unstyled">
                                <li><a title="CA Courses" href="/ca">

                                        CA
                                    </a></li>
                                <p>Get updates and latest lectures for CA on these Channels. </p>
                                <ul class="social_footers">
                                    <li><a title="You Tube" href="https://www.youtube.com/c/TopLadCA" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a title="Telegram" href="https://t.me/TopLadCA" target="_blank"
                                            rel="noopener"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a title="CA Courses" href="/blog/ca" target="_blank" rel="noopener">Blog</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                        <div class="common_cols_footer course_level_links">

                            <ul class="list-unstyled">
                                <li><a title="CS Courses" href="/cs">

                                        CS
                                    </a></li>
                                <p>Keep yourself updated with latest content about CS with our official channels.</p>
                                <ul class="social_footers">
                                    <li><a title="You Tube" href="https://www.youtube.com/c/TopLadCS" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a title="Telegram" href="https://t.me/TopLadCS" target="_blank"
                                            rel="noopener"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a title="CS Courses" href="/blog/cs" target="_blank" rel="noopener"> Blog</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    @elseif($segment == 'cma')
                        <div class="common_cols_footer">
                            <h2 class="foot_titler">CMA Courses</h2>
                            <ul class="list-unstyled">
                                <li><a title="Foundation" href="/cma/cma-foundation" target="_blank">Foundation</a></li>
                                <li><a title="Inter Group 1" href="/cma/cma-inter-group-1" target="_blank">Inter Group
                                        1</a></li>
                                <li><a title="Inter Group 2" href="/cma/cma-inter-group-2" target="_blank">Inter Group
                                        2</a></li>
                                <li><a title="Final Group 1" href="/cma/cma-final-group-3" target="_blank">Final
                                        Group
                                        3</a></li>
                                <li><a title="FInal Group 2" href="/cma/cma-final-group-4" target="_blank">FInal
                                        Group
                                        4</a></li>
                            </ul>
                        </div>
                        <div class="common_cols_footer">
                            <h2 class="foot_titler"><a title="CMA" href="/blog/cma/" target="_blank"><span
                                        style="font-weight:500;font-size:16px;color:#373A3C;">CMA BLOG</span></a></h2>
                            <ul class="list-unstyled">
                                <li><a title="CMA General" href="/blog/cma/category/cma-general/" target="_blank">CMA
                                        General</a></li>
                                <li><a title="CMA Foundation" href="/blog/cma/category/cma-foundation/"
                                        target="_blank">CMA Foundation</a></li>
                                <li><a title="CMA Intermediate" href="/blog/cma/category/cma-intermediate/"
                                        target="_blank">CMA Intermediate</a></li>
                                <li><a title="CMA Final" href="/blog/cma/category/cma-final/" target="_blank">CMA
                                        Final</a></li>
                            </ul>
                        </div>
                        <div class="common_cols_footer">
                            <div class="wrap_footer_infos">
                                <h2 class="foot_titler">Connect With Us</h2>
                                <ul class="social_footers">
                                    <li style="display:flex;padding-top:4px;"><a title="You Tube"
                                            href="https://www.youtube.com/c/TopLadCMA" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.youtube.com/c/TopLadCMA"
                                            style="background:transparent;word-break:unset;">Youtube</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Facebook"
                                            href="https://www.facebook.com/toplad" target="_blank" rel="noopener"><i
                                                class="fa fa-facebook"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.facebook.com/toplad"
                                            style="background:transparent;word-break:unset;">Facebook</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Instagram"
                                            href="https://www.instagram.com/toplad.in/" target="_blank"
                                            rel="noopener"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.instagram.com/toplad.in/"
                                            style="background:transparent;word-break:unset;">Instagram</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Telegram"
                                            href="https://t.me/TopLadCMA" target="_blank" rel="noopener"><i
                                                class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://t.me/TopLadCMA"
                                            style="background:transparent;word-break:unset;">Telegram</a></li>
                                </ul>
                            </div>
                        </div>
                    @elseif($segment == 'cs')
                        <div class="common_cols_footer">
                            <h2 class="foot_titler">CS Courses</h2>
                            <ul class="list-unstyled">
                                <li><a title="CSEET" href="/cs/cseet" target="_blank">CSEET</a></li>
                                <li><a title="Executive Mod 1" href="/cs/cs-executive-mod-1"
                                        target="_blank">Executive
                                        Mod 1</a></li>
                                <li><a title="Executive Mod 2" href="/cs/cs-executive-mod-2"
                                        target="_blank">Executive
                                        Mod 2</a></li>
                                <li><a title="Professional Mod 1" href="/cs/cs-professional-mod-1"
                                        target="_blank">Professional Mod 1</a></li>
                                <li><a title="Professional Mod 2" href="/cs/cs-professional-mod-2"
                                        target="_blank">Professional Mod 2</a></li>
                                <li><a title="Professional Mod 3" href="/cs/cs-professional-mod-3"
                                        target="_blank">Professional Mod 3</a></li>
                            </ul>
                        </div>
                        <div class="common_cols_footer">
                            <h2 class="foot_titler"><a title="CS" href="/blog/cs/" target="_blank"><span
                                        style="font-weight:500;font-size:16px;color:#373A3C;">CS BLOG</span></a></h2>
                            <ul class="list-unstyled">
                                <li><a title="CSEET" href="/blog/cs/category/cseet/" target="_blank">CSEET</a></li>
                                <li><a title="CS General" href="/blog/cs/category/cs-general/" target="_blank">CS
                                        General</a></li>
                                <li><a title="CS Executive" href="/blog/cs/category/cs-executive/" target="_blank">CS
                                        Executive</a></li>
                                <li><a title="CS Professional" href="/blog/cs/category/cs-professional/"
                                        target="_blank">CS Professional</a></li>
                            </ul>
                        </div>
                        <div class="common_cols_footer">
                            <div class="wrap_footer_infos">
                                <h2 class="foot_titler">Connect With Us</h2>
                                <ul class="social_footers">
                                    <li style="display:flex;padding-top:4px;"><a title="You Tube"
                                            href="https://www.youtube.com/c/TopLadCS" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.youtube.com/c/TopLadCS"
                                            style="background:transparent;word-break:unset;">Youtube</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Facebook"
                                            href="https://www.facebook.com/toplad" target="_blank" rel="noopener"><i
                                                class="fa fa-facebook"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.facebook.com/toplad"
                                            style="background:transparent;word-break:unset;">Facebook</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Instagram"
                                            href="https://www.instagram.com/toplad.in/" target="_blank"
                                            rel="noopener"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.instagram.com/toplad.in/"
                                            style="background:transparent;word-break:unset;">Instagram</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Telegram"
                                            href="https://t.me/TopLadCS" target="_blank" rel="noopener"><i
                                                class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://t.me/TopLadCS"
                                            style="background:transparent;word-break:unset;">Telegram</a></li>
                                </ul>
                            </div>
                        </div>
                    @elseif($segment == 'ca')
                        <div class="common_cols_footer">
                            <h2 class="foot_titler">CA Courses</h2>
                            <ul class="list-unstyled">
                                <li><a title="Foundation" href="/ca/ca-foundation" target="_blank">Foundation</a>
                                </li>
                                <li><a title="Inter Group 1" href="/ca/ca-inter-group-1" target="_blank">Inter Group
                                        1</a></li>
                                <li><a title="Inter Group 2" href="/ca/ca-inter-group-2" target="_blank">Inter Group
                                        2</a></li>
                                <li><a title="Final Group 1" href="/ca/ca-final-group-1" target="_blank">Final Group
                                        1</a></li>
                                <li><a title="Final Group 2" href="/ca/ca-final-group-2" target="_blank">FInal Group
                                        2</a></li>
                            </ul>
                        </div>
                        <!-- <div class="common_cols_footer">
                        <h2 class="foot_titler"><a title="CA" href="/blog/ca/" target="_blank"><span style="font-weight:500;font-size:16px;color:#373A3C;">CA BLOG</span></a></h2>
                        <ul class="list-unstyled">
                            <li><a title="CA Foundation" href="/blog/ca/category/ca-foundation/" target="_blank">CA Foundation</a></li>
                            <li><a title="CA General" href="/blog/ca/category/ca-general/" target="_blank">CA General</a></li>
                            <li><a title="CA Executive" href="/blog/ca/category/ca-executive/" target="_blank">CA Executive</a></li>
                            <li><a title="CA Professional" href="/blog/ca/category/ca-professional/" target="_blank">CA Professional</a></li>
                        </ul>
                    </div> -->
                        <div class="common_cols_footer">
                            <div class="wrap_footer_infos">
                                <h2 class="foot_titler">Connect With Us</h2>
                                <ul class="social_footers">
                                    <li style="display:flex;padding-top:4px;"><a title="You Tube"
                                            href="https://www.youtube.com/c/TopLadCA" target="_blank"
                                            rel="noopener"><i class="fa fa-youtube"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.youtube.com/c/TopLadCA"
                                            style="background:transparent;word-break:unset;">Youtube</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Facebook"
                                            href="https://www.facebook.com/toplad" target="_blank" rel="noopener"><i
                                                class="fa fa-facebook"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.facebook.com/toplad"
                                            style="background:transparent;word-break:unset;">Facebook</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Instagram"
                                            href="https://www.instagram.com/toplad.in/" target="_blank"
                                            rel="noopener"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://www.instagram.com/toplad.in/"
                                            style="background:transparent;word-break:unset;">Instagram</a></li>
                                    <li style="display:flex;padding-top:4px;"><a title="Telegram"
                                            href="https://t.me/TopLadCA" target="_blank" rel="noopener"><i
                                                class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="https://t.me/TopLadCA"
                                            style="background:transparent;word-break:unset;">Telegram</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="common_cols_footer address_footer">
                        <h2 class="foot_titler">Have a Question?</h2>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span class="text">TopLad, A-56,
                                    Plot No-3, Lalita Park, Laxmi Nagar, East Delhi, Delhi, India, 110092</span></li>
                            <li class="caller_footer"><i class="fa fa-phone" aria-hidden="true"></i><span
                                    class="text"><a title="Contacts Us" href="tel:011-41681230">011-41681230</a>,
                                    <a title="Contacts Us" href="tel:9953155682">9953155682</a>, <a
                                        title="Contacts Us" href="tel:9953155680">9953155680</a>, <a
                                        title="Contacts Us" href="tel:9953155628">9953155628</a>, <a
                                        title="Contacts Us" href="tel:9953155557">9953155557</a>, <a
                                        title="Contacts Us" href="tel:9953155643">9953155643</a>, <a
                                        title="Contacts Us" href="tel:8700349015">8700349015</a>, <a
                                        title="Contacts Us" href="tel:7701837553">7701837553</a>
                                </span></li>
                            <li class="caller_footer"><i class="fa fa-phone" aria-hidden="true"></i><span
                                    class="text">
                                    <a title="Contacts Us" href="tel:18003091245">Toll Free No : 18003091245</a>
                                </span></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="text"><a
                                        title="Mail Us" href="mailto:info@toplad.in">info@toplad.in</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class=" bottom_foot_rows">
        <div class="container">
            <div class="wrap_footer">
                <div class="row d-flex foot_row">
                    <div class="inner__botfooter">
                        <p class="common_align">
                            <span><a title="FAQs" href="/faq">FAQs</a></span> <span class="px-2">-</span>
                            <span><a title="Privacy Policy" href="/privacy-policy">Privacy & Policy</a></span> <span
                                class="px-2">-</span>
                            <span><a title="Terms & Conditions" href="/terms-&-conditions">Terms &
                                    Conditions</a></span>
                            <span class="px-2">-</span>
                            <span><a title="Refund Policy" href="/refund-policy">Refund Policy</a></span>
                        </p>
                    </div>

                    <div class="inner__botfooter app_bfooter">
                        <h5>Connect With Us</h5>
                        <ul class="social_footers">

                            <li><a title="Facebook" href="https://www.facebook.com/toplad" target="_blank"
                                    rel="noopener"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a title="Instagram" href="https://www.instagram.com/toplad.in/" target="_blank"
                                    rel="noopener"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" bottom_foot_rows">
        <div class="container">
            <div class="wrap_footer">
                <div class="row d-flex foot_row">

                    <p class="common_align text-center">&copy;
                        Copyright <?php echo date('Y'); ?>
                        <a href="/" title="Toplad">TopLad</a>. All rights
                        reserved | Designed by <a
                            style="font-size: 16px;
    line-height: 32px;
    font-weight: 300;
    margin-bottom: 0;"
                            href="https://mindrops.com/" title="mindrops" target="_blank">Mindrops</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
