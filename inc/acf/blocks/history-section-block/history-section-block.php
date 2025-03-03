<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'animation-container' => 'animation-container',
    'ball-container' => 'ball-container',
    'path-container' => 'path-container',
    'content-container' => 'content-container',

];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['history-section-block'] ?? []);
}
?>

<section class='section'>
    <div class='container'>
        <!-- h2_title -->
        <?php
            $h2_title = get_field('h2_title');
            if (!empty($h2_title)) : 
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title'); ?>
            </div>
        <?php endif; ?>
        <!-- content with animation -->
        <div class="<?php echo esc_attr($classes['content-with-animation-wrapper']); ?>">
            <!-- ball + path -->
            <div class="<?php echo esc_attr($classes['animation-container']); ?>">
                <div class="<?php echo esc_attr($classes['ball-container']); ?>">
                    <svg id='ball' width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.0744 11.651C17.1051 11.4578 17.3296 11.6987 17.4021 11.7551C18.218 12.3907 18.697 13.077 18.8574 14.0541C19.0402 15.1681 19.0727 16.4133 18.9345 17.5329C18.7663 18.8954 17.7991 19.7079 16.6889 20.5519C14.5758 22.1584 12.6526 23.6848 9.73039 23.6317C6.5511 23.5738 5.25084 20.3706 5.32591 17.8365C5.43732 14.0757 11.5328 13.409 14.6264 13.3688C17.2977 13.334 19.5961 13.4233 20.1585 16.1102C20.6008 18.2232 18.4229 19.1118 16.3227 19.1118C15.1994 19.1118 14.5333 18.6292 13.9903 17.7758C13.744 17.3887 13.1247 16.5233 13.3928 16.0408C14.0354 14.8839 15.968 15.4813 16.1299 16.596C16.6106 19.9048 12.0607 20.5784 9.60509 18.973C8.16129 18.0291 7.6251 16.4339 7.44623 14.9043C7.34279 14.0198 7.29162 13.1516 7.6679 12.3017C8.40609 10.6342 10.3348 10.4183 12.1206 10.558C15.3193 10.8081 20.1764 12.0866 22.0764 14.6787C23.1717 16.173 21.9983 17.8858 20.4862 18.6954C18.6557 19.6755 16.1595 19.7849 14.2023 19.0424C11.1982 17.9027 8.2525 13.9039 9.89423 10.9483C11.8225 7.47691 18.5128 8.88231 20.9488 11.0264C24.0711 13.7746 23.6361 19.6645 21.556 22.7902C19.9348 25.2262 16.7688 25.5776 14.0096 24.6553C9.57421 23.1729 6.12249 19.3125 4.75728 15.312C3.50308 11.6368 3.46315 6.3091 6.54991 3.28804C8.35565 1.52073 11.1679 1.79315 13.3349 2.78487C16.1243 4.06136 18.0161 6.39383 19.0116 9.02243C20.0914 11.8735 20.5732 16.0162 18.4044 18.5566C15.7765 21.6347 10.643 23.0139 6.66556 21.2373C4.23895 20.1533 3.35352 18.0911 3.09957 15.7805C2.76842 12.7675 3.17129 9.99364 5.72106 7.82523C9.31242 4.77102 14.1406 4.39987 18.8285 4.65874C22.4053 4.85626 23.9386 9.02208 24.5533 11.7031C25.0819 14.0083 25.339 17.1504 24.1775 19.3461C23.2162 21.1631 21.9057 22.6426 20.3031 24.0394C18.4736 25.6339 16.6086 26.1831 14.0481 25.948C10.5002 25.6221 7.01136 23.7088 5.79816 20.604C4.30588 16.7849 4.5821 12.8879 8.41964 10.3497C10.8632 8.73361 14.4761 7.4654 17.5467 7.74715C21.6787 8.12631 23.4972 11.8616 24.0522 15.1385C24.3962 17.1698 24.4659 19.9947 22.7414 21.6103C20.87 23.3636 17.4344 23.0249 15.2143 22.1655C12.733 21.205 9.08458 19.0446 8.40037 16.4745C7.86524 14.4644 10.6056 14.0671 12.1398 14.5052C14.0229 15.043 15.6114 16.5739 15.9371 18.3484C16.3011 20.3312 14.2143 20.3491 12.7374 19.7017C12.1394 19.4397 10.4429 18.4218 11.6772 17.8539C12.3398 17.5491 12.9283 17.6193 13.6048 17.7411" stroke="#B74028" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                 <!-- 1920 -->
                <div class="<?php echo esc_attr($classes['path-container']); ?>">
                    <svg width="394" height="2719" viewBox="0 0 394 2719" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id='trajectory' d="M13.4606 0.5C-7.30271 69.1415 3.12083 263.252 172.582 278.098M172.582 278.098C186.124 278.098 198.338 271.755 192.895 263.402C187.575 255.237 178.386 263.402 172.582 278.098ZM172.582 278.098C156.621 362.466 172.582 529.622 304.685 545.402M304.685 545.402C325.818 552.799 328.21 548.361 331.001 545.402C336.982 543.43 339.773 510.39 313.856 514.829C299.986 520.361 300.698 530.609 304.685 545.402ZM304.685 545.402C369.384 630.785 182.003 564.5 28.003 664.5C-31.8202 739.509 7.75038 902.134 165.919 912.227M165.919 912.227C178.559 912.227 189.96 907.915 184.879 902.236C179.914 896.685 171.337 902.236 165.919 912.227ZM165.919 912.227C151.022 969.583 165.92 1083.22 289.22 1093.95M289.22 1093.95C308.945 1098.98 311.178 1095.96 313.783 1093.95C319.365 1092.61 330.734 1073.03 306.543 1076.05C294.1 1078.55 294.1 1084.55 289.22 1093.95ZM289.22 1093.95C264.73 1107.14 339.088 1172.56 306.543 1211.56C273.999 1250.57 363.783 1305.07 363.783 1305.07M363.783 1305.07C375.678 1317.21 384.78 1311.07 389.088 1305.07C393.395 1299.07 393.874 1292.57 389.088 1288.57C384.302 1284.57 373.165 1284.58 363.783 1305.07ZM363.783 1305.07L114.15 1352.58M114.5 1352.5C-37.5001 1385.5 -42.46 1653.26 162.054 1673.76M162.054 1673.76C180 1678.5 198.569 1666.53 192 1655C185.579 1643.73 158.5 1655.5 162.054 1673.76ZM162.054 1673.76C-14.4999 1875 162.054 2021.01 321.483 2042.79M321.483 2042.79C346.987 2053.01 349.874 2046.88 353.243 2042.79C360.461 2040.07 363.829 1994.46 332.551 2000.59C315.811 2008.22 316.671 2022.37 321.483 2042.79ZM321.483 2042.79C418.594 2189.4 388.977 2200.98 136.5 2226.5C49.0801 2238.75 20.0005 2257.5 16.5005 2317.5C16.5005 2376 -9.15889 2507.11 156.086 2517.2M156.086 2517.2C169.291 2517.2 181.201 2512.89 175.893 2507.21C170.706 2501.66 161.745 2507.21 156.086 2517.2ZM156.086 2517.2C140.522 2574.55 156.086 2688.17 284.902 2698.9M284.902 2698.9C305.509 2703.93 307.842 2700.91 310.563 2698.9C316.395 2697.56 328.273 2677.98 303 2681C289.475 2684.76 281.014 2688.84 284.902 2698.9ZM284.902 2698.9C264.5 2714.5 218 2718 200 2718" stroke="#B74028" stroke-width="2" stroke-dasharray="4 4"/>
                    </svg>
                </div>
                <!-- 1440 -->
                <div class="<?php echo esc_attr($classes['path-container1440']); ?>">
                    <svg width="238" height="2103" viewBox="0 0 238 2103" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id='trajectory1440' d="M6.65622 1.18799C-5.89733 54.2535 0.404686 204.317 102.861 215.794M102.861 215.794C111.049 215.794 118.434 210.89 115.143 204.433C111.926 198.121 106.37 204.433 102.861 215.794ZM102.861 215.794C93.2114 281.017 102.861 410.243 182.731 422.442M182.731 422.442C195.508 428.161 196.954 424.73 198.642 422.442C202.258 420.917 203.946 395.375 188.276 398.806C179.89 403.083 180.321 411.006 182.731 422.442ZM182.731 422.442C221.849 488.45 110.106 436.382 16.9967 513.69C-19.1115 571.734 4.77261 697.577 100.24 705.387M100.24 705.387C107.87 705.387 114.751 702.05 111.684 697.656C108.687 693.361 103.51 697.656 100.24 705.387ZM100.24 705.387C91.2488 749.771 100.24 837.707 174.662 846.008M174.662 846.008C186.568 849.9 187.915 847.565 189.488 846.008C192.857 844.971 199.719 829.821 185.118 832.156C177.608 834.09 177.608 838.734 174.662 846.008ZM174.662 846.008C159.88 856.22 204.761 906.838 185.118 937.021C165.475 967.203 219.667 1009.38 219.667 1009.38M219.667 1009.38C226.846 1018.77 232.341 1014.03 234.94 1009.38C237.54 1004.74 237.829 999.708 234.94 996.612C232.052 993.516 225.33 993.526 219.667 1009.38ZM219.667 1009.38L67.7448 1046.4C-24.1548 1071.91 -27.1536 1278.91 96.4961 1294.76M96.4961 1294.76C107.346 1298.42 118.573 1289.17 114.602 1280.25C110.72 1271.54 94.3474 1280.64 96.4961 1294.76ZM96.4961 1294.76C-10.2489 1450.33 96.4961 1563.21 192.887 1580.05M192.887 1580.05C208.307 1587.94 210.053 1583.21 212.089 1580.05C216.453 1577.94 218.49 1542.68 199.579 1547.42C189.458 1553.32 189.978 1564.26 192.887 1580.05ZM192.887 1580.05C218.5 1685 176.5 1679 53.4998 1737.5C5.49843 1762.5 -17.6055 1910.88 82.0506 1920M82.0506 1920C90.0145 1920 109.197 1916.1 105.996 1910.97C102.867 1905.96 85.4637 1910.97 82.0506 1920ZM82.0506 1920C72.6646 1971.84 94.0504 2074.54 171.737 2084.24M171.737 2084.24C184.165 2088.78 185.572 2086.05 187.213 2084.24C190.731 2083.02 197.893 2065.33 182.652 2068.06C174.495 2071.46 169.393 2075.15 171.737 2084.24ZM171.737 2084.24C159.433 2098.34 131.39 2101.5 120.534 2101.5" stroke="#B74028" stroke-width="2" stroke-dasharray="4 4"/>
                    </svg>
                </div>
                <!-- 768 -->
                <div class="<?php echo esc_attr($classes['path-container768']); ?>">
                <svg width="240" height="3055" viewBox="0 0 240 3055" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id='trajectory768' d="M6.65615 0.5C-5.8974 77.6388 0.404686 295.779 102.861 312.462
                        M102.861 312.462C111.049 312.462 118.434 305.334 115.143 295.947
                        C111.926 286.771 106.37 295.947 102.861 312.462
                        M102.861 312.462C93.2114 407.274 102.861 595.124 182.731 612.857
                        M182.731 612.857C195.508 621.17 196.954 616.182 198.642 612.857
                        C202.258 610.64 203.946 573.511 188.276 578.499
                        C179.89 584.716 180.321 596.232 182.731 612.857
                        M182.731 612.857C221.849 708.81 110.106 633.121 16.9967 745.5
                        C-19.1114 829.875 4.77261 1012.81 100.24 1024.16
                        M100.24 1024.16C107.87 1024.16 114.751 1019.31 111.684 1012.92
                        C108.687 1006.68 103.51 1012.92 100.24 1024.16
                        M100.24 1024.16C91.2488 1088.68 100.24 1216.51 174.662 1228.57
                        M174.662 1228.57C186.568 1234.23 193.798 1227.54 195.37 1225.28
                        C197.122 1222.19 199.719 1205.04 185.118 1208.44
                        C177.608 1211.25 177.608 1218 174.662 1228.57
                        M174.662 1228.57C159.88 1243.42 204.761 1317 185.118 1360.88
                        C165.475 1404.75 219.667 1466.06 219.667 1466.06
                        M219.667 1466.06C226.846 1479.72 235.136 1472.81 237.736 1466.06
                        C240.336 1459.31 237.829 1452 234.94 1447.5
                        C232.052 1443 225.33 1443.01 219.667 1466.06
                        M219.667 1466.06L144.33 1492.78L67.7448 1519.87
                        M67.7448 1519.87C-24.1548 1556.95 -27.1536 1857.86 96.4961 1880.9
                        M96.4961 1880.9C107.346 1886.22 122.582 1874.26 118.61 1861.3
                        C114.728 1848.64 94.3474 1860.38 96.4961 1880.9
                        M96.4961 1880.9C-10.2489 2107.05 96.4961 2271.13 192.887 2295.62
                        M192.887 2295.62C208.307 2307.09 214.367 2299.26 216.404 2294.66
                        C221.515 2279.09 218.49 2241.3 199.579 2248.18
                        C189.458 2256.76 189.978 2272.66 192.887 2295.62
                        M192.887 2295.62C251.601 2460.37 234.648 2472.82 82 2501.5
                        C29.3286 2515.25 11.9778 2536.25 9.86898 2603.58
                        C9.86898 2669.31 -5.60574 2816.54 94.0504 2827.88
                        M94.0504 2827.88C102.014 2827.88 109.197 2823.04 105.996 2816.66
                        C102.868 2810.42 94.0504 2817.15 94.0504 2827.88
                        M94.0504 2827.88C84.6644 2892.32 94.0504 3019.99 171.737 3032.04
                        M171.737 3032.04C184.165 3037.69 187.907 3034.3 189.549 3032.04
                        C192.277 3028.28 197.894 3008.54 182.652 3011.93
                        C174.495 3016.15 169.393 3020.74 171.737 3032.04
                        M171.737 3032.04C159.433 3049.57 131.39 3053.5 120.534 3053.5" 
                        stroke="#B74028" stroke-width="2" stroke-dasharray="4 4"/>
                    </svg>
                </div>
                 <!-- 360 -->
                <div class="<?php echo esc_attr($classes['path-container360']); ?>">
                    <svg width="2" height="3302" viewBox="0 0 2 3302" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id='trajectory360' d="M1 0.5 V3301.5" stroke="#B74028" stroke-width="2" stroke-dasharray="4 4"/>
                    </svg>
                </div>
            </div>
            <!-- content -->
            <div class="<?php echo esc_attr($classes['content-container']); ?>">
                <div class="<?php echo esc_attr($classes['story1']); ?>">
                    <div class="<?php echo esc_attr($classes['photo']); ?>">
                        <?php
                        $photo_url = get_field('history_photo_1') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-vertical', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'history-photo'
                        ]);
                        ?>
                    </div>
                    <div class="<?php echo esc_attr($classes['story-info']); ?>">
                        <div class="<?php echo esc_attr($classes['year-event']); ?>">
                            <h4 id='year2022' class="<?php echo esc_attr($classes['year']); ?>"><?php echo the_field('history_year_1'); ?> рік</h4>
                            <p class="<?php echo esc_attr($classes['event-title']); ?>"><?php echo the_field('history_event_1'); ?></p>
                        </div>
                        <div class="<?php echo esc_attr($classes['event-description']); ?>">
                            <p><?php echo the_field('history_description_1'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="<?php echo esc_attr($classes['story2']); ?>">
                    <div class="<?php echo esc_attr($classes['story-info']); ?>">
                        <div class="<?php echo esc_attr($classes['year-event']); ?>">
                            <h4 id='year2023' class="<?php echo esc_attr($classes['year']); ?>"><?php echo the_field('history_year_2'); ?> рік</h4>
                            <p class="<?php echo esc_attr($classes['event-title']); ?>"><?php echo the_field('history_event_2'); ?></p>
                        </div>
                        <div class="<?php echo esc_attr($classes['event-description']); ?>">
                            <p><?php echo the_field('history_description_2'); ?></p>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($classes['photo']); ?>">
                        <?php
                        $photo_url = get_field('history_photo_2') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-vertical', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'history-photo'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="<?php echo esc_attr($classes['story3']); ?>">
                    <div class="<?php echo esc_attr($classes['photo']); ?>">
                        <?php
                        $photo_url = get_field('history_photo_3') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-vertical', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'history-photo'
                        ]);
                        ?>
                    </div>
                    <div class="<?php echo esc_attr($classes['story-info']); ?>">
                        <div class="<?php echo esc_attr($classes['year-event']); ?>">
                            <h4 id='year2024' class="<?php echo esc_attr($classes['year']); ?>"><?php echo the_field('history_year_3'); ?> рік</h4>
                            <p class="<?php echo esc_attr($classes['event-title']); ?>"><?php echo the_field('history_event_3'); ?></p>
                        </div>
                        <div class="<?php echo esc_attr($classes['event-description']); ?>">
                            <p><?php echo the_field('history_description_3'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="<?php echo esc_attr($classes['story4']); ?>">
                    <div class="<?php echo esc_attr($classes['story-info']); ?>">
                        <div class="<?php echo esc_attr($classes['year-event']); ?>">
                            <h4 id='year2024' class="<?php echo esc_attr($classes['year']); ?>"><?php echo the_field('history_year_4'); ?> рік</h4>
                            <p class="<?php echo esc_attr($classes['event-title']); ?>"><?php echo the_field('history_event_4'); ?></p>
                        </div>
                        <div class="<?php echo esc_attr($classes['event-description']); ?>">
                            <p><?php echo the_field('history_description_4'); ?></p>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($classes['photo']); ?>">
                        <?php
                        $photo_url = get_field('history_photo_4') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-vertical', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'history-photo'
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js"></script>
</section>