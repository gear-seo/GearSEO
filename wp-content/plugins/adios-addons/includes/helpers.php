<?php

/**
 *
 * Hex to Rgba
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_hex2rgba' ) ) {
  function rs_hex2rgba( $hexcolor, $opacity = 1 ) {

    $hex    = str_replace( '#', '', $hexcolor );

    if( strlen( $hex ) == 3 ) {
      $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
      $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
      $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
    } else {
      $r    = hexdec( substr( $hex, 0, 2 ) );
      $g    = hexdec( substr( $hex, 2, 2 ) );
      $b    = hexdec( substr( $hex, 4, 2 ) );
    }

    return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;
  }
}

/**
 *
 * Get Fontawesome Icons
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('rs_fontawesome_icons')) {
  function rs_fontawesome_icons() {
    $icons = array('fa fa-glass', 'fa fa-music', 'fa fa-search', 'fa fa-envelope-o', 'fa fa-heart', 'fa fa-star', 'fa fa-star-o', 'fa fa-user', 'fa fa-film', 'fa fa-th-large', 'fa fa-th', 'fa fa-th-list', 'fa fa-check', 'fa fa-times', 'fa fa-search-plus', 'fa fa-search-minus', 'fa fa-power-off', 'fa fa-signal', 'fa fa-cog', 'fa fa-trash-o', 'fa fa-home', 'fa fa-file-o', 'fa fa-clock-o', 'fa fa-road', 'fa fa-download', 'fa fa-arrow-circle-o-down', 'fa fa-arrow-circle-o-up', 'fa fa-inbox', 'fa fa-play-circle-o', 'fa fa-repeat', 'fa fa-refresh', 'fa fa-list-alt', 'fa fa-lock', 'fa fa-flag', 'fa fa-headphones', 'fa fa-volume-off', 'fa fa-volume-down', 'fa fa-volume-up', 'fa fa-qrcode', 'fa fa-barcode', 'fa fa-tag', 'fa fa-tags', 'fa fa-book', 'fa fa-bookmark', 'fa fa-print', 'fa fa-camera', 'fa fa-font', 'fa fa-bold', 'fa fa-italic', 'fa fa-text-height', 'fa fa-text-width', 'fa fa-align-left', 'fa fa-align-center', 'fa fa-align-right', 'fa fa-align-justify', 'fa fa-list', 'fa fa-outdent', 'fa fa-indent', 'fa fa-video-camera', 'fa fa-picture-o', 'fa fa-pencil', 'fa fa-map-marker', 'fa fa-adjust', 'fa fa-tint', 'fa fa-pencil-square-o', 'fa fa-share-square-o', 'fa fa-check-square-o', 'fa fa-arrows', 'fa fa-step-backward', 'fa fa-fast-backward', 'fa fa-backward', 'fa fa-play', 'fa fa-pause', 'fa fa-stop', 'fa fa-forward', 'fa fa-fast-forward', 'fa fa-step-forward', 'fa fa-eject', 'fa fa-chevron-left', 'fa fa-chevron-right', 'fa fa-plus-circle', 'fa fa-minus-circle', 'fa fa-times-circle', 'fa fa-check-circle', 'fa fa-question-circle', 'fa fa-info-circle', 'fa fa-crosshairs', 'fa fa-times-circle-o', 'fa fa-check-circle-o', 'fa fa-ban', 'fa fa-arrow-left', 'fa fa-arrow-right', 'fa fa-arrow-up', 'fa fa-arrow-down', 'fa fa-share', 'fa fa-expand', 'fa fa-compress', 'fa fa-plus', 'fa fa-minus', 'fa fa-asterisk', 'fa fa-exclamation-circle', 'fa fa-gift', 'fa fa-leaf', 'fa fa-fire', 'fa fa-eye', 'fa fa-eye-slash', 'fa fa-exclamation-triangle', 'fa fa-plane', 'fa fa-calendar', 'fa fa-random', 'fa fa-comment', 'fa fa-magnet', 'fa fa-chevron-up', 'fa fa-chevron-down', 'fa fa-retweet', 'fa fa-shopping-cart', 'fa fa-folder', 'fa fa-folder-open', 'fa fa-arrows-v', 'fa fa-arrows-h', 'fa fa-bar-chart', 'fa fa-twitter-square', 'fa fa-facebook-square', 'fa fa-camera-retro', 'fa fa-key', 'fa fa-cogs', 'fa fa-comments', 'fa fa-thumbs-o-up', 'fa fa-thumbs-o-down', 'fa fa-star-half', 'fa fa-heart-o', 'fa fa-sign-out', 'fa fa-linkedin-square', 'fa fa-thumb-tack', 'fa fa-external-link', 'fa fa-sign-in', 'fa fa-trophy', 'fa fa-github-square', 'fa fa-upload', 'fa fa-lemon-o', 'fa fa-phone', 'fa fa-square-o', 'fa fa-bookmark-o', 'fa fa-phone-square', 'fa fa-twitter', 'fa fa-facebook', 'fa fa-github', 'fa fa-unlock', 'fa fa-credit-card', 'fa fa-rss', 'fa fa-hdd-o', 'fa fa-bullhorn', 'fa fa-bell', 'fa fa-certificate', 'fa fa-hand-o-right', 'fa fa-hand-o-left', 'fa fa-hand-o-up', 'fa fa-hand-o-down', 'fa fa-arrow-circle-left', 'fa fa-arrow-circle-right', 'fa fa-arrow-circle-up', 'fa fa-arrow-circle-down', 'fa fa-globe', 'fa fa-wrench', 'fa fa-tasks', 'fa fa-filter', 'fa fa-briefcase', 'fa fa-arrows-alt', 'fa fa-users', 'fa fa-link', 'fa fa-cloud', 'fa fa-flask', 'fa fa-scissors', 'fa fa-files-o', 'fa fa-paperclip', 'fa fa-floppy-o', 'fa fa-square', 'fa fa-bars', 'fa fa-list-ul', 'fa fa-list-ol', 'fa fa-strikethrough', 'fa fa-underline', 'fa fa-table', 'fa fa-magic', 'fa fa-truck', 'fa fa-pinterest', 'fa fa-pinterest-square', 'fa fa-google-plus-square', 'fa fa-google-plus', 'fa fa-money', 'fa fa-caret-down', 'fa fa-caret-up', 'fa fa-caret-left', 'fa fa-caret-right', 'fa fa-columns', 'fa fa-sort', 'fa fa-sort-desc', 'fa fa-sort-asc', 'fa fa-envelope', 'fa fa-linkedin', 'fa fa-undo', 'fa fa-gavel', 'fa fa-tachometer', 'fa fa-comment-o', 'fa fa-comments-o', 'fa fa-bolt', 'fa fa-sitemap', 'fa fa-umbrella', 'fa fa-clipboard', 'fa fa-lightbulb-o', 'fa fa-exchange', 'fa fa-cloud-download', 'fa fa-cloud-upload', 'fa fa-user-md', 'fa fa-stethoscope', 'fa fa-suitcase', 'fa fa-bell-o', 'fa fa-coffee', 'fa fa-cutlery', 'fa fa-file-text-o', 'fa fa-building-o', 'fa fa-hospital-o', 'fa fa-ambulance', 'fa fa-medkit', 'fa fa-fighter-jet', 'fa fa-beer', 'fa fa-h-square', 'fa fa-plus-square', 'fa fa-angle-double-left', 'fa fa-angle-double-right', 'fa fa-angle-double-up', 'fa fa-angle-double-down', 'fa fa-angle-left', 'fa fa-angle-right', 'fa fa-angle-up', 'fa fa-angle-down', 'fa fa-desktop', 'fa fa-laptop', 'fa fa-tablet', 'fa fa-mobile', 'fa fa-circle-o', 'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-spinner', 'fa fa-circle', 'fa fa-reply', 'fa fa-github-alt', 'fa fa-folder-o', 'fa fa-folder-open-o', 'fa fa-smile-o', 'fa fa-frown-o', 'fa fa-meh-o', 'fa fa-gamepad', 'fa fa-keyboard-o', 'fa fa-flag-o', 'fa fa-flag-checkered', 'fa fa-terminal', 'fa fa-code', 'fa fa-reply-all', 'fa fa-star-half-o', 'fa fa-location-arrow', 'fa fa-crop', 'fa fa-code-fork', 'fa fa-chain-broken', 'fa fa-question', 'fa fa-info', 'fa fa-exclamation', 'fa fa-superscript', 'fa fa-subscript', 'fa fa-eraser', 'fa fa-puzzle-piece', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-shield', 'fa fa-calendar-o', 'fa fa-fire-extinguisher', 'fa fa-rocket', 'fa fa-maxcdn', 'fa fa-chevron-circle-left', 'fa fa-chevron-circle-right', 'fa fa-chevron-circle-up', 'fa fa-chevron-circle-down', 'fa fa-html5', 'fa fa-css3', 'fa fa-anchor', 'fa fa-unlock-alt', 'fa fa-bullseye', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-rss-square', 'fa fa-play-circle', 'fa fa-ticket', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-level-up', 'fa fa-level-down', 'fa fa-check-square', 'fa fa-pencil-square', 'fa fa-external-link-square', 'fa fa-share-square', 'fa fa-compass', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-up', 'fa fa-caret-square-o-right', 'fa fa-eur', 'fa fa-gbp', 'fa fa-usd', 'fa fa-inr', 'fa fa-jpy', 'fa fa-rub', 'fa fa-krw', 'fa fa-btc', 'fa fa-file', 'fa fa-file-text', 'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-thumbs-up', 'fa fa-thumbs-down', 'fa fa-youtube-square', 'fa fa-youtube', 'fa fa-xing', 'fa fa-xing-square', 'fa fa-youtube-play', 'fa fa-dropbox', 'fa fa-stack-overflow', 'fa fa-instagram', 'fa fa-flickr', 'fa fa-adn', 'fa fa-bitbucket', 'fa fa-bitbucket-square', 'fa fa-tumblr', 'fa fa-tumblr-square', 'fa fa-long-arrow-down', 'fa fa-long-arrow-up', 'fa fa-long-arrow-left', 'fa fa-long-arrow-right', 'fa fa-apple', 'fa fa-windows', 'fa fa-android', 'fa fa-linux', 'fa fa-dribbble', 'fa fa-skype', 'fa fa-foursquare', 'fa fa-trello', 'fa fa-female', 'fa fa-male', 'fa fa-gratipay', 'fa fa-sun-o', 'fa fa-moon-o', 'fa fa-archive', 'fa fa-bug', 'fa fa-vk', 'fa fa-weibo', 'fa fa-renren', 'fa fa-pagelines', 'fa fa-stack-exchange', 'fa fa-arrow-circle-o-right', 'fa fa-arrow-circle-o-left', 'fa fa-caret-square-o-left', 'fa fa-dot-circle-o', 'fa fa-wheelchair', 'fa fa-vimeo-square', 'fa fa-try', 'fa fa-plus-square-o', 'fa fa-space-shuttle', 'fa fa-slack', 'fa fa-envelope-square', 'fa fa-wordpress', 'fa fa-openid', 'fa fa-university', 'fa fa-graduation-cap', 'fa fa-yahoo', 'fa fa-google', 'fa fa-reddit', 'fa fa-reddit-square', 'fa fa-stumbleupon-circle', 'fa fa-stumbleupon', 'fa fa-delicious', 'fa fa-digg', 'fa fa-pied-piper', 'fa fa-pied-piper-alt', 'fa fa-drupal', 'fa fa-joomla', 'fa fa-language', 'fa fa-fax', 'fa fa-building', 'fa fa-child', 'fa fa-paw', 'fa fa-spoon', 'fa fa-cube', 'fa fa-cubes', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-steam', 'fa fa-steam-square', 'fa fa-recycle', 'fa fa-car', 'fa fa-taxi', 'fa fa-tree', 'fa fa-spotify', 'fa fa-deviantart', 'fa fa-soundcloud', 'fa fa-database', 'fa fa-file-pdf-o', 'fa fa-file-word-o', 'fa fa-file-excel-o', 'fa fa-file-powerpoint-o', 'fa fa-file-image-o', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-video-o', 'fa fa-file-code-o', 'fa fa-vine', 'fa fa-codepen', 'fa fa-jsfiddle', 'fa fa-life-ring', 'fa fa-circle-o-notch', 'fa fa-rebel', 'fa fa-empire', 'fa fa-git-square', 'fa fa-git', 'fa fa-hacker-news', 'fa fa-tencent-weibo', 'fa fa-qq', 'fa fa-weixin', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-history', 'fa fa-circle-thin', 'fa fa-header', 'fa fa-paragraph', 'fa fa-sliders', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-bomb', 'fa fa-futbol-o', 'fa fa-tty', 'fa fa-binoculars', 'fa fa-plug', 'fa fa-slideshare', 'fa fa-twitch', 'fa fa-yelp', 'fa fa-newspaper-o', 'fa fa-wifi', 'fa fa-calculator', 'fa fa-paypal', 'fa fa-google-wallet', 'fa fa-cc-visa', 'fa fa-cc-mastercard', 'fa fa-cc-discover', 'fa fa-cc-amex', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-bell-slash', 'fa fa-bell-slash-o', 'fa fa-trash', 'fa fa-copyright', 'fa fa-at', 'fa fa-eyedropper', 'fa fa-paint-brush', 'fa fa-birthday-cake', 'fa fa-area-chart', 'fa fa-pie-chart', 'fa fa-line-chart', 'fa fa-lastfm', 'fa fa-lastfm-square', 'fa fa-toggle-off', 'fa fa-toggle-on', 'fa fa-bicycle', 'fa fa-bus', 'fa fa-ioxhost', 'fa fa-angellist', 'fa fa-cc', 'fa fa-ils', 'fa fa-meanpath', 'fa fa-buysellads', 'fa fa-connectdevelop', 'fa fa-dashcube', 'fa fa-forumbee', 'fa fa-leanpub', 'fa fa-sellsy', 'fa fa-shirtsinbulk', 'fa fa-simplybuilt', 'fa fa-skyatlas', 'fa fa-cart-plus', 'fa fa-cart-arrow-down', 'fa fa-diamond', 'fa fa-ship', 'fa fa-user-secret', 'fa fa-motorcycle', 'fa fa-street-view', 'fa fa-heartbeat', 'fa fa-venus', 'fa fa-mars', 'fa fa-mercury', 'fa fa-transgender', 'fa fa-transgender-alt', 'fa fa-venus-double', 'fa fa-mars-double', 'fa fa-venus-mars', 'fa fa-mars-stroke', 'fa fa-mars-stroke-v', 'fa fa-mars-stroke-h', 'fa fa-neuter', 'fa fa-genderless', 'fa fa-facebook-official', 'fa fa-pinterest-p', 'fa fa-whatsapp', 'fa fa-server', 'fa fa-user-plus', 'fa fa-user-times', 'fa fa-bed', 'fa fa-viacoin', 'fa fa-train', 'fa fa-subway', 'fa fa-medium', 'fa fa-y-combinator', 'fa fa-optin-monster', 'fa fa-opencart', 'fa fa-expeditedssl', 'fa fa-battery-full', 'fa fa-battery-three-quarters', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-empty', 'fa fa-mouse-pointer', 'fa fa-i-cursor', 'fa fa-object-group', 'fa fa-object-ungroup', 'fa fa-sticky-note', 'fa fa-sticky-note-o', 'fa fa-cc-jcb', 'fa fa-cc-diners-club', 'fa fa-clone', 'fa fa-balance-scale', 'fa fa-hourglass-o', 'fa fa-hourglass-start', 'fa fa-hourglass-half', 'fa fa-hourglass-end', 'fa fa-hourglass', 'fa fa-hand-rock-o', 'fa fa-hand-paper-o', 'fa fa-hand-scissors-o', 'fa fa-hand-lizard-o', 'fa fa-hand-spock-o', 'fa fa-hand-pointer-o', 'fa fa-hand-peace-o', 'fa fa-trademark', 'fa fa-registered', 'fa fa-creative-commons', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-tripadvisor', 'fa fa-odnoklassniki', 'fa fa-odnoklassniki-square', 'fa fa-get-pocket', 'fa fa-wikipedia-w', 'fa fa-safari', 'fa fa-chrome', 'fa fa-firefox', 'fa fa-opera', 'fa fa-internet-explorer', 'fa fa-television', 'fa fa-contao', 'fa fa-500px', 'fa fa-amazon', 'fa fa-calendar-plus-o', 'fa fa-calendar-minus-o', 'fa fa-calendar-times-o', 'fa fa-calendar-check-o', 'fa fa-industry', 'fa fa-map-pin', 'fa fa-map-signs', 'fa fa-map-o', 'fa fa-map', 'fa fa-commenting', 'fa fa-commenting-o', 'fa fa-houzz', 'fa fa-vimeo', 'fa fa-black-tie', 'fa fa-fonticons', 'fa fa-reddit-alien', 'fa fa-edge', 'fa fa-credit-card-alt', 'fa fa-codiepie', 'fa fa-modx', 'fa fa-fort-awesome', 'fa fa-usb', 'fa fa-product-hunt', 'fa fa-mixcloud', 'fa fa-scribd', 'fa fa-pause-circle', 'fa fa-pause-circle-o', 'fa fa-stop-circle', 'fa fa-stop-circle-o', 'fa fa-shopping-bag', 'fa fa-shopping-basket', 'fa fa-hashtag', 'fa fa-bluetooth', 'fa fa-bluetooth-b', 'fa fa-percent');
    $icons_keys = array();
    foreach($icons as $icon) {
      $icons_keys[] = str_replace('fa fa-', '', $icon);
    }
    return array_combine($icons_keys, $icons);
  }
}

/**
 *
 * Get Font Icons
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('rs_font_icons')) {
  function rs_font_icons() {
    return array_flip(array( 'basic-accelerator' => 'icon-basic-accelerator', 'basic-alarm' => 'icon-basic-alarm', 'basic-anchor' => 'icon-basic-anchor', 'basic-anticlockwise' => 'icon-basic-anticlockwise', 'basic-archive' => 'icon-basic-archive', 'basic-archive-full' => 'icon-basic-archive-full', 'basic-ban' => 'icon-basic-ban', 'basic-battery-charge' => 'icon-basic-battery-charge', 'basic-battery-empty' => 'icon-basic-battery-empty', 'basic-battery-full' => 'icon-basic-battery-full', 'basic-battery-half' => 'icon-basic-battery-half', 'basic-bolt' => 'icon-basic-bolt', 'basic-book' => 'icon-basic-book', 'basic-book-pen' => 'icon-basic-book-pen', 'basic-book-pencil' => 'icon-basic-book-pencil', 'basic-bookmark' => 'icon-basic-bookmark', 'basic-calculator' => 'icon-basic-calculator', 'basic-calendar' => 'icon-basic-calendar', 'basic-cards-diamonds' => 'icon-basic-cards-diamonds', 'basic-cards-hearts' => 'icon-basic-cards-hearts', 'basic-case' => 'icon-basic-case', 'basic-chronometer' => 'icon-basic-chronometer', 'basic-clessidre' => 'icon-basic-clessidre', 'basic-clock' => 'icon-basic-clock', 'basic-clockwise' => 'icon-basic-clockwise', 'basic-cloud' => 'icon-basic-cloud', 'basic-clubs' => 'icon-basic-clubs', 'basic-compass' => 'icon-basic-compass', 'basic-cup' => 'icon-basic-cup', 'basic-diamonds' => 'icon-basic-diamonds', 'basic-display' => 'icon-basic-display', 'basic-download' => 'icon-basic-download', 'basic-exclamation' => 'icon-basic-exclamation', 'basic-eye' => 'icon-basic-eye', 'basic-eye-closed' => 'icon-basic-eye-closed', 'basic-female' => 'icon-basic-female', 'basic-flag1' => 'icon-basic-flag1', 'basic-flag2' => 'icon-basic-flag2', 'basic-floppydisk' => 'icon-basic-floppydisk', 'basic-folder' => 'icon-basic-folder', 'basic-folder-multiple' => 'icon-basic-folder-multiple', 'basic-gear' => 'icon-basic-gear', 'basic-geolocalize-01' => 'icon-basic-geolocalize-01', 'basic-geolocalize-05' => 'icon-basic-geolocalize-05', 'basic-globe' => 'icon-basic-globe', 'basic-gunsight' => 'icon-basic-gunsight', 'basic-hammer' => 'icon-basic-hammer', 'basic-headset' => 'icon-basic-headset', 'basic-heart' => 'icon-basic-heart', 'basic-heart-broken' => 'icon-basic-heart-broken', 'basic-helm' => 'icon-basic-helm', 'basic-home' => 'icon-basic-home', 'basic-info' => 'icon-basic-info', 'basic-ipod' => 'icon-basic-ipod', 'basic-joypad' => 'icon-basic-joypad', 'basic-key' => 'icon-basic-key', 'basic-keyboard' => 'icon-basic-keyboard', 'basic-laptop' => 'icon-basic-laptop', 'basic-life-buoy' => 'icon-basic-life-buoy', 'basic-lightbulb' => 'icon-basic-lightbulb', 'basic-link' => 'icon-basic-link', 'basic-lock' => 'icon-basic-lock', 'basic-lock-open' => 'icon-basic-lock-open', 'basic-magic-mouse' => 'icon-basic-magic-mouse', 'basic-magnifier' => 'icon-basic-magnifier', 'basic-magnifier-minus' => 'icon-basic-magnifier-minus', 'basic-magnifier-plus' => 'icon-basic-magnifier-plus', 'basic-mail' => 'icon-basic-mail', 'basic-mail-multiple' => 'icon-basic-mail-multiple', 'basic-mail-open' => 'icon-basic-mail-open', 'basic-mail-open-text' => 'icon-basic-mail-open-text', 'basic-male' => 'icon-basic-male', 'basic-map' => 'icon-basic-map', 'basic-message' => 'icon-basic-message', 'basic-message-multiple' => 'icon-basic-message-multiple', 'basic-message-txt' => 'icon-basic-message-txt', 'basic-mixer2' => 'icon-basic-mixer2', 'basic-mouse' => 'icon-basic-mouse', 'basic-notebook' => 'icon-basic-notebook', 'basic-notebook-pen' => 'icon-basic-notebook-pen', 'basic-notebook-pencil' => 'icon-basic-notebook-pencil', 'basic-paperplane' => 'icon-basic-paperplane', 'basic-pencil-ruler' => 'icon-basic-pencil-ruler', 'basic-pencil-ruler-pen' => 'icon-basic-pencil-ruler-pen', 'basic-photo' => 'icon-basic-photo', 'basic-picture' => 'icon-basic-picture', 'basic-picture-multiple' => 'icon-basic-picture-multiple', 'basic-pin1' => 'icon-basic-pin1', 'basic-pin2' => 'icon-basic-pin2', 'basic-postcard' => 'icon-basic-postcard', 'basic-postcard-multiple' => 'icon-basic-postcard-multiple', 'basic-printer' => 'icon-basic-printer', 'basic-question' => 'icon-basic-question', 'basic-rss' => 'icon-basic-rss', 'basic-server' => 'icon-basic-server', 'basic-server2' => 'icon-basic-server2', 'basic-server-cloud' => 'icon-basic-server-cloud', 'basic-server-download' => 'icon-basic-server-download', 'basic-server-upload' => 'icon-basic-server-upload', 'basic-settings' => 'icon-basic-settings', 'basic-share' => 'icon-basic-share', 'basic-sheet' => 'icon-basic-sheet', 'basic-sheet-multiple' => 'icon-basic-sheet-multiple', 'basic-sheet-pen' => 'icon-basic-sheet-pen', 'basic-sheet-pencil' => 'icon-basic-sheet-pencil', 'basic-sheet-txt' => 'icon-basic-sheet-txt', 'basic-signs' => 'icon-basic-signs', 'basic-smartphone' => 'icon-basic-smartphone', 'basic-spades' => 'icon-basic-spades', 'basic-spread' => 'icon-basic-spread', 'basic-spread-bookmark' => 'icon-basic-spread-bookmark', 'basic-spread-text' => 'icon-basic-spread-text', 'basic-spread-text-bookmark' => 'icon-basic-spread-text-bookmark', 'basic-star' => 'icon-basic-star', 'basic-tablet' => 'icon-basic-tablet', 'basic-target' => 'icon-basic-target', 'basic-todo' => 'icon-basic-todo', 'basic-todo-pen' => 'icon-basic-todo-pen', 'basic-todo-pencil' => 'icon-basic-todo-pencil', 'basic-todo-txt' => 'icon-basic-todo-txt', 'basic-todolist-pen' => 'icon-basic-todolist-pen', 'basic-todolist-pencil' => 'icon-basic-todolist-pencil', 'basic-trashcan' => 'icon-basic-trashcan', 'basic-trashcan-full' => 'icon-basic-trashcan-full', 'basic-trashcan-refresh' => 'icon-basic-trashcan-refresh', 'basic-trashcan-remove' => 'icon-basic-trashcan-remove', 'basic-upload' => 'icon-basic-upload', 'basic-usb' => 'icon-basic-usb', 'basic-video' => 'icon-basic-video', 'basic-watch' => 'icon-basic-watch', 'basic-webpage' => 'icon-basic-webpage', 'basic-webpage-img-txt' => 'icon-basic-webpage-img-txt', 'basic-webpage-multiple' => 'icon-basic-webpage-multiple', 'basic-webpage-txt' => 'icon-basic-webpage-txt', 'basic-world' => 'icon-basic-world', 'ecommerce-bag' => 'icon-ecommerce-bag', 'ecommerce-bag-check' => 'icon-ecommerce-bag-check', 'ecommerce-bag-cloud' => 'icon-ecommerce-bag-cloud', 'ecommerce-bag-download' => 'icon-ecommerce-bag-download', 'ecommerce-bag-minus' => 'icon-ecommerce-bag-minus', 'ecommerce-bag-plus' => 'icon-ecommerce-bag-plus', 'ecommerce-bag-refresh' => 'icon-ecommerce-bag-refresh', 'ecommerce-bag-remove' => 'icon-ecommerce-bag-remove', 'ecommerce-bag-search' => 'icon-ecommerce-bag-search', 'ecommerce-bag-upload' => 'icon-ecommerce-bag-upload', 'ecommerce-banknote' => 'icon-ecommerce-banknote', 'ecommerce-banknotes' => 'icon-ecommerce-banknotes', 'ecommerce-basket' => 'icon-ecommerce-basket', 'ecommerce-basket-check' => 'icon-ecommerce-basket-check', 'ecommerce-basket-cloud' => 'icon-ecommerce-basket-cloud', 'ecommerce-basket-download' => 'icon-ecommerce-basket-download', 'ecommerce-basket-minus' => 'icon-ecommerce-basket-minus', 'ecommerce-basket-plus' => 'icon-ecommerce-basket-plus', 'ecommerce-basket-refresh' => 'icon-ecommerce-basket-refresh', 'ecommerce-basket-remove' => 'icon-ecommerce-basket-remove', 'ecommerce-basket-search' => 'icon-ecommerce-basket-search', 'ecommerce-basket-upload' => 'icon-ecommerce-basket-upload', 'ecommerce-bath' => 'icon-ecommerce-bath', 'ecommerce-cart' => 'icon-ecommerce-cart', 'ecommerce-cart-check' => 'icon-ecommerce-cart-check', 'ecommerce-cart-cloud' => 'icon-ecommerce-cart-cloud', 'ecommerce-cart-content' => 'icon-ecommerce-cart-content', 'ecommerce-cart-download' => 'icon-ecommerce-cart-download', 'ecommerce-cart-minus' => 'icon-ecommerce-cart-minus', 'ecommerce-cart-plus' => 'icon-ecommerce-cart-plus', 'ecommerce-cart-refresh' => 'icon-ecommerce-cart-refresh', 'ecommerce-cart-remove' => 'icon-ecommerce-cart-remove', 'ecommerce-cart-search' => 'icon-ecommerce-cart-search', 'ecommerce-cart-upload' => 'icon-ecommerce-cart-upload', 'ecommerce-cent' => 'icon-ecommerce-cent', 'ecommerce-colon' => 'icon-ecommerce-colon', 'ecommerce-creditcard' => 'icon-ecommerce-creditcard', 'ecommerce-diamond' => 'icon-ecommerce-diamond', 'ecommerce-dollar' => 'icon-ecommerce-dollar', 'ecommerce-euro' => 'icon-ecommerce-euro', 'ecommerce-franc' => 'icon-ecommerce-franc', 'ecommerce-gift' => 'icon-ecommerce-gift', 'ecommerce-graph1' => 'icon-ecommerce-graph1', 'ecommerce-graph2' => 'icon-ecommerce-graph2', 'ecommerce-graph3' => 'icon-ecommerce-graph3', 'ecommerce-graph-decrease' => 'icon-ecommerce-graph-decrease', 'ecommerce-graph-increase' => 'icon-ecommerce-graph-increase', 'ecommerce-guarani' => 'icon-ecommerce-guarani', 'ecommerce-kips' => 'icon-ecommerce-kips', 'ecommerce-lira' => 'icon-ecommerce-lira', 'ecommerce-megaphone' => 'icon-ecommerce-megaphone', 'ecommerce-money' => 'icon-ecommerce-money', 'ecommerce-naira' => 'icon-ecommerce-naira', 'ecommerce-pesos' => 'icon-ecommerce-pesos', 'ecommerce-pound' => 'icon-ecommerce-pound', 'ecommerce-receipt' => 'icon-ecommerce-receipt', 'ecommerce-receipt-bath' => 'icon-ecommerce-receipt-bath', 'ecommerce-receipt-cent' => 'icon-ecommerce-receipt-cent', 'ecommerce-receipt-dollar' => 'icon-ecommerce-receipt-dollar', 'ecommerce-receipt-euro' => 'icon-ecommerce-receipt-euro', 'ecommerce-receipt-franc' => 'icon-ecommerce-receipt-franc', 'ecommerce-receipt-guarani' => 'icon-ecommerce-receipt-guarani', 'ecommerce-receipt-kips' => 'icon-ecommerce-receipt-kips', 'ecommerce-receipt-lira' => 'icon-ecommerce-receipt-lira', 'ecommerce-receipt-naira' => 'icon-ecommerce-receipt-naira', 'ecommerce-receipt-pesos' => 'icon-ecommerce-receipt-pesos', 'ecommerce-receipt-pound' => 'icon-ecommerce-receipt-pound', 'ecommerce-receipt-rublo' => 'icon-ecommerce-receipt-rublo', 'ecommerce-receipt-rupee' => 'icon-ecommerce-receipt-rupee', 'ecommerce-receipt-tugrik' => 'icon-ecommerce-receipt-tugrik', 'ecommerce-receipt-won' => 'icon-ecommerce-receipt-won', 'ecommerce-receipt-yen' => 'icon-ecommerce-receipt-yen', 'ecommerce-receipt-yen2' => 'icon-ecommerce-receipt-yen2', 'ecommerce-recept-colon' => 'icon-ecommerce-recept-colon', 'ecommerce-rublo' => 'icon-ecommerce-rublo', 'ecommerce-rupee' => 'icon-ecommerce-rupee', 'ecommerce-safe' => 'icon-ecommerce-safe', 'ecommerce-sale' => 'icon-ecommerce-sale', 'ecommerce-sales' => 'icon-ecommerce-sales', 'ecommerce-ticket' => 'icon-ecommerce-ticket', 'ecommerce-tugriks' => 'icon-ecommerce-tugriks', 'ecommerce-wallet' => 'icon-ecommerce-wallet', 'ecommerce-won' => 'icon-ecommerce-won', 'ecommerce-yen' => 'icon-ecommerce-yen', 'ecommerce-yen2' => 'icon-ecommerce-yen2', 'software-add-vectorpoint' => 'icon-software-add-vectorpoint', 'software-box-oval' => 'icon-software-box-oval', 'software-box-polygon' => 'icon-software-box-polygon', 'software-box-rectangle' => 'icon-software-box-rectangle', 'software-box-roundedrectangle' => 'icon-software-box-roundedrectangle', 'software-character' => 'icon-software-character', 'software-crop' => 'icon-software-crop', 'software-eyedropper' => 'icon-software-eyedropper', 'software-font-allcaps' => 'icon-software-font-allcaps', 'software-font-baseline-shift' => 'icon-software-font-baseline-shift', 'software-font-horizontal-scale' => 'icon-software-font-horizontal-scale', 'software-font-kerning' => 'icon-software-font-kerning', 'software-font-leading' => 'icon-software-font-leading', 'software-font-size' => 'icon-software-font-size', 'software-font-smallcapital' => 'icon-software-font-smallcapital', 'software-font-smallcaps' => 'icon-software-font-smallcaps', 'software-font-strikethrough' => 'icon-software-font-strikethrough', 'software-font-tracking' => 'icon-software-font-tracking', 'software-font-underline' => 'icon-software-font-underline', 'software-font-vertical-scale' => 'icon-software-font-vertical-scale', 'software-horizontal-align-center' => 'icon-software-horizontal-align-center', 'software-horizontal-align-left' => 'icon-software-horizontal-align-left', 'software-horizontal-align-right' => 'icon-software-horizontal-align-right', 'software-horizontal-distribute-center' => 'icon-software-horizontal-distribute-center', 'software-horizontal-distribute-left' => 'icon-software-horizontal-distribute-left', 'software-horizontal-distribute-right' => 'icon-software-horizontal-distribute-right', 'software-indent-firstline' => 'icon-software-indent-firstline', 'software-indent-left' => 'icon-software-indent-left', 'software-indent-right' => 'icon-software-indent-right', 'software-lasso' => 'icon-software-lasso', 'software-layers1' => 'icon-software-layers1', 'software-layers2' => 'icon-software-layers2', 'software-layout' => 'icon-software-layout', 'software-layout-2columns' => 'icon-software-layout-2columns', 'software-layout-3columns' => 'icon-software-layout-3columns', 'software-layout-4boxes' => 'icon-software-layout-4boxes', 'software-layout-4columns' => 'icon-software-layout-4columns', 'software-layout-4lines' => 'icon-software-layout-4lines', 'software-layout-8boxes' => 'icon-software-layout-8boxes', 'software-layout-header' => 'icon-software-layout-header', 'software-layout-header-2columns' => 'icon-software-layout-header-2columns', 'software-layout-header-3columns' => 'icon-software-layout-header-3columns', 'software-layout-header-4boxes' => 'icon-software-layout-header-4boxes', 'software-layout-header-4columns' => 'icon-software-layout-header-4columns', 'software-layout-header-complex' => 'icon-software-layout-header-complex', 'software-layout-header-complex2' => 'icon-software-layout-header-complex2', 'software-layout-header-complex3' => 'icon-software-layout-header-complex3', 'software-layout-header-complex4' => 'icon-software-layout-header-complex4', 'software-layout-header-sideleft' => 'icon-software-layout-header-sideleft', 'software-layout-header-sideright' => 'icon-software-layout-header-sideright', 'software-layout-sidebar-left' => 'icon-software-layout-sidebar-left', 'software-layout-sidebar-right' => 'icon-software-layout-sidebar-right', 'software-magnete' => 'icon-software-magnete', 'software-pages' => 'icon-software-pages', 'software-paintbrush' => 'icon-software-paintbrush', 'software-paintbucket' => 'icon-software-paintbucket', 'software-paintroller' => 'icon-software-paintroller', 'software-paragraph' => 'icon-software-paragraph', 'software-paragraph-align-left' => 'icon-software-paragraph-align-left', 'software-paragraph-align-right' => 'icon-software-paragraph-align-right', 'software-paragraph-center' => 'icon-software-paragraph-center', 'software-paragraph-justify-all' => 'icon-software-paragraph-justify-all', 'software-paragraph-justify-center' => 'icon-software-paragraph-justify-center', 'software-paragraph-justify-left' => 'icon-software-paragraph-justify-left', 'software-paragraph-justify-right' => 'icon-software-paragraph-justify-right', 'software-paragraph-space-after' => 'icon-software-paragraph-space-after', 'software-paragraph-space-before' => 'icon-software-paragraph-space-before', 'software-pathfinder-exclude' => 'icon-software-pathfinder-exclude', 'software-pathfinder-intersect' => 'icon-software-pathfinder-intersect', 'software-pathfinder-subtract' => 'icon-software-pathfinder-subtract', 'software-pathfinder-unite' => 'icon-software-pathfinder-unite', 'software-pen' => 'icon-software-pen', 'software-pen-add' => 'icon-software-pen-add', 'software-pen-remove' => 'icon-software-pen-remove', 'software-pencil' => 'icon-software-pencil', 'software-polygonallasso' => 'icon-software-polygonallasso', 'software-reflect-horizontal' => 'icon-software-reflect-horizontal', 'software-reflect-vertical' => 'icon-software-reflect-vertical', 'software-remove-vectorpoint' => 'icon-software-remove-vectorpoint', 'software-scale-expand' => 'icon-software-scale-expand', 'software-scale-reduce' => 'icon-software-scale-reduce', 'software-selection-oval' => 'icon-software-selection-oval', 'software-selection-polygon' => 'icon-software-selection-polygon', 'software-selection-rectangle' => 'icon-software-selection-rectangle', 'software-selection-roundedrectangle' => 'icon-software-selection-roundedrectangle', 'software-shape-oval' => 'icon-software-shape-oval', 'software-shape-polygon' => 'icon-software-shape-polygon', 'software-shape-rectangle' => 'icon-software-shape-rectangle', 'software-shape-roundedrectangle' => 'icon-software-shape-roundedrectangle', 'software-slice' => 'icon-software-slice', 'software-transform-bezier' => 'icon-software-transform-bezier', 'software-vector-box' => 'icon-software-vector-box', 'software-vector-composite' => 'icon-software-vector-composite', 'software-vector-line' => 'icon-software-vector-line', 'software-vertical-align-bottom' => 'icon-software-vertical-align-bottom', 'software-vertical-align-center' => 'icon-software-vertical-align-center', 'software-vertical-align-top' => 'icon-software-vertical-align-top', 'software-vertical-distribute-bottom' => 'icon-software-vertical-distribute-bottom', 'software-vertical-distribute-center' => 'icon-software-vertical-distribute-center', 'software-vertical-distribute-top' => 'icon-software-vertical-distribute-top', 'basic-elaboration-bookmark-checck' => 'icon-basic-elaboration-bookmark-checck', 'basic-elaboration-bookmark-minus' => 'icon-basic-elaboration-bookmark-minus', 'basic-elaboration-bookmark-plus' => 'icon-basic-elaboration-bookmark-plus', 'basic-elaboration-bookmark-remove' => 'icon-basic-elaboration-bookmark-remove', 'basic-elaboration-briefcase-check' => 'icon-basic-elaboration-briefcase-check', 'basic-elaboration-briefcase-download' => 'icon-basic-elaboration-briefcase-download', 'basic-elaboration-briefcase-flagged' => 'icon-basic-elaboration-briefcase-flagged', 'basic-elaboration-briefcase-minus' => 'icon-basic-elaboration-briefcase-minus', 'basic-elaboration-briefcase-plus' => 'icon-basic-elaboration-briefcase-plus', 'basic-elaboration-briefcase-refresh' => 'icon-basic-elaboration-briefcase-refresh', 'basic-elaboration-briefcase-remove' => 'icon-basic-elaboration-briefcase-remove', 'basic-elaboration-briefcase-search' => 'icon-basic-elaboration-briefcase-search', 'basic-elaboration-briefcase-star' => 'icon-basic-elaboration-briefcase-star', 'basic-elaboration-briefcase-upload' => 'icon-basic-elaboration-briefcase-upload', 'basic-elaboration-browser-check' => 'icon-basic-elaboration-browser-check', 'basic-elaboration-browser-download' => 'icon-basic-elaboration-browser-download', 'basic-elaboration-browser-minus' => 'icon-basic-elaboration-browser-minus', 'basic-elaboration-browser-plus' => 'icon-basic-elaboration-browser-plus', 'basic-elaboration-browser-refresh' => 'icon-basic-elaboration-browser-refresh', 'basic-elaboration-browser-remove' => 'icon-basic-elaboration-browser-remove', 'basic-elaboration-browser-search' => 'icon-basic-elaboration-browser-search', 'basic-elaboration-browser-star' => 'icon-basic-elaboration-browser-star', 'basic-elaboration-browser-upload' => 'icon-basic-elaboration-browser-upload', 'basic-elaboration-calendar-check' => 'icon-basic-elaboration-calendar-check', 'basic-elaboration-calendar-cloud' => 'icon-basic-elaboration-calendar-cloud', 'basic-elaboration-calendar-download' => 'icon-basic-elaboration-calendar-download', 'basic-elaboration-calendar-empty' => 'icon-basic-elaboration-calendar-empty', 'basic-elaboration-calendar-flagged' => 'icon-basic-elaboration-calendar-flagged', 'basic-elaboration-calendar-heart' => 'icon-basic-elaboration-calendar-heart', 'basic-elaboration-calendar-minus' => 'icon-basic-elaboration-calendar-minus', 'basic-elaboration-calendar-next' => 'icon-basic-elaboration-calendar-next', 'basic-elaboration-calendar-noaccess' => 'icon-basic-elaboration-calendar-noaccess', 'basic-elaboration-calendar-pencil' => 'icon-basic-elaboration-calendar-pencil', 'basic-elaboration-calendar-plus' => 'icon-basic-elaboration-calendar-plus', 'basic-elaboration-calendar-previous' => 'icon-basic-elaboration-calendar-previous', 'basic-elaboration-calendar-refresh' => 'icon-basic-elaboration-calendar-refresh', 'basic-elaboration-calendar-remove' => 'icon-basic-elaboration-calendar-remove', 'basic-elaboration-calendar-search' => 'icon-basic-elaboration-calendar-search', 'basic-elaboration-calendar-star' => 'icon-basic-elaboration-calendar-star', 'basic-elaboration-calendar-upload' => 'icon-basic-elaboration-calendar-upload', 'basic-elaboration-cloud-check' => 'icon-basic-elaboration-cloud-check', 'basic-elaboration-cloud-download' => 'icon-basic-elaboration-cloud-download', 'basic-elaboration-cloud-minus' => 'icon-basic-elaboration-cloud-minus', 'basic-elaboration-cloud-noaccess' => 'icon-basic-elaboration-cloud-noaccess', 'basic-elaboration-cloud-plus' => 'icon-basic-elaboration-cloud-plus', 'basic-elaboration-cloud-refresh' => 'icon-basic-elaboration-cloud-refresh', 'basic-elaboration-cloud-remove' => 'icon-basic-elaboration-cloud-remove', 'basic-elaboration-cloud-search' => 'icon-basic-elaboration-cloud-search', 'basic-elaboration-cloud-upload' => 'icon-basic-elaboration-cloud-upload', 'basic-elaboration-document-check' => 'icon-basic-elaboration-document-check', 'basic-elaboration-document-cloud' => 'icon-basic-elaboration-document-cloud', 'basic-elaboration-document-download' => 'icon-basic-elaboration-document-download', 'basic-elaboration-document-flagged' => 'icon-basic-elaboration-document-flagged', 'basic-elaboration-document-graph' => 'icon-basic-elaboration-document-graph', 'basic-elaboration-document-heart' => 'icon-basic-elaboration-document-heart', 'basic-elaboration-document-minus' => 'icon-basic-elaboration-document-minus', 'basic-elaboration-document-next' => 'icon-basic-elaboration-document-next', 'basic-elaboration-document-noaccess' => 'icon-basic-elaboration-document-noaccess', 'basic-elaboration-document-note' => 'icon-basic-elaboration-document-note', 'basic-elaboration-document-pencil' => 'icon-basic-elaboration-document-pencil', 'basic-elaboration-document-picture' => 'icon-basic-elaboration-document-picture', 'basic-elaboration-document-plus' => 'icon-basic-elaboration-document-plus', 'basic-elaboration-document-previous' => 'icon-basic-elaboration-document-previous', 'basic-elaboration-document-refresh' => 'icon-basic-elaboration-document-refresh', 'basic-elaboration-document-remove' => 'icon-basic-elaboration-document-remove', 'basic-elaboration-document-search' => 'icon-basic-elaboration-document-search', 'basic-elaboration-document-star' => 'icon-basic-elaboration-document-star', 'basic-elaboration-document-upload' => 'icon-basic-elaboration-document-upload', 'basic-elaboration-folder-check' => 'icon-basic-elaboration-folder-check', 'basic-elaboration-folder-cloud' => 'icon-basic-elaboration-folder-cloud', 'basic-elaboration-folder-document' => 'icon-basic-elaboration-folder-document', 'basic-elaboration-folder-download' => 'icon-basic-elaboration-folder-download', 'basic-elaboration-folder-flagged' => 'icon-basic-elaboration-folder-flagged', 'basic-elaboration-folder-graph' => 'icon-basic-elaboration-folder-graph', 'basic-elaboration-folder-heart' => 'icon-basic-elaboration-folder-heart', 'basic-elaboration-folder-minus' => 'icon-basic-elaboration-folder-minus', 'basic-elaboration-folder-next' => 'icon-basic-elaboration-folder-next', 'basic-elaboration-folder-noaccess' => 'icon-basic-elaboration-folder-noaccess', 'basic-elaboration-folder-note' => 'icon-basic-elaboration-folder-note', 'basic-elaboration-folder-pencil' => 'icon-basic-elaboration-folder-pencil', 'basic-elaboration-folder-picture' => 'icon-basic-elaboration-folder-picture', 'basic-elaboration-folder-plus' => 'icon-basic-elaboration-folder-plus', 'basic-elaboration-folder-previous' => 'icon-basic-elaboration-folder-previous', 'basic-elaboration-folder-refresh' => 'icon-basic-elaboration-folder-refresh', 'basic-elaboration-folder-remove' => 'icon-basic-elaboration-folder-remove', 'basic-elaboration-folder-search' => 'icon-basic-elaboration-folder-search', 'basic-elaboration-folder-star' => 'icon-basic-elaboration-folder-star', 'basic-elaboration-folder-upload' => 'icon-basic-elaboration-folder-upload', 'basic-elaboration-mail-check' => 'icon-basic-elaboration-mail-check', 'basic-elaboration-mail-cloud' => 'icon-basic-elaboration-mail-cloud', 'basic-elaboration-mail-document' => 'icon-basic-elaboration-mail-document', 'basic-elaboration-mail-download' => 'icon-basic-elaboration-mail-download', 'basic-elaboration-mail-flagged' => 'icon-basic-elaboration-mail-flagged', 'basic-elaboration-mail-heart' => 'icon-basic-elaboration-mail-heart', 'basic-elaboration-mail-next' => 'icon-basic-elaboration-mail-next', 'basic-elaboration-mail-noaccess' => 'icon-basic-elaboration-mail-noaccess', 'basic-elaboration-mail-note' => 'icon-basic-elaboration-mail-note', 'basic-elaboration-mail-pencil' => 'icon-basic-elaboration-mail-pencil', 'basic-elaboration-mail-picture' => 'icon-basic-elaboration-mail-picture', 'basic-elaboration-mail-previous' => 'icon-basic-elaboration-mail-previous', 'basic-elaboration-mail-refresh' => 'icon-basic-elaboration-mail-refresh', 'basic-elaboration-mail-remove' => 'icon-basic-elaboration-mail-remove', 'basic-elaboration-mail-search' => 'icon-basic-elaboration-mail-search', 'basic-elaboration-mail-star' => 'icon-basic-elaboration-mail-star', 'basic-elaboration-mail-upload' => 'icon-basic-elaboration-mail-upload', 'basic-elaboration-message-check' => 'icon-basic-elaboration-message-check', 'basic-elaboration-message-dots' => 'icon-basic-elaboration-message-dots', 'basic-elaboration-message-happy' => 'icon-basic-elaboration-message-happy', 'basic-elaboration-message-heart' => 'icon-basic-elaboration-message-heart', 'basic-elaboration-message-minus' => 'icon-basic-elaboration-message-minus', 'basic-elaboration-message-note' => 'icon-basic-elaboration-message-note', 'basic-elaboration-message-plus' => 'icon-basic-elaboration-message-plus', 'basic-elaboration-message-refresh' => 'icon-basic-elaboration-message-refresh', 'basic-elaboration-message-remove' => 'icon-basic-elaboration-message-remove', 'basic-elaboration-message-sad' => 'icon-basic-elaboration-message-sad', 'basic-elaboration-smartphone-cloud' => 'icon-basic-elaboration-smartphone-cloud', 'basic-elaboration-smartphone-heart' => 'icon-basic-elaboration-smartphone-heart', 'basic-elaboration-smartphone-noaccess' => 'icon-basic-elaboration-smartphone-noaccess', 'basic-elaboration-smartphone-note' => 'icon-basic-elaboration-smartphone-note', 'basic-elaboration-smartphone-pencil' => 'icon-basic-elaboration-smartphone-pencil', 'basic-elaboration-smartphone-picture' => 'icon-basic-elaboration-smartphone-picture', 'basic-elaboration-smartphone-refresh' => 'icon-basic-elaboration-smartphone-refresh', 'basic-elaboration-smartphone-search' => 'icon-basic-elaboration-smartphone-search', 'basic-elaboration-tablet-cloud' => 'icon-basic-elaboration-tablet-cloud', 'basic-elaboration-tablet-heart' => 'icon-basic-elaboration-tablet-heart', 'basic-elaboration-tablet-noaccess' => 'icon-basic-elaboration-tablet-noaccess', 'basic-elaboration-tablet-note' => 'icon-basic-elaboration-tablet-note', 'basic-elaboration-tablet-pencil' => 'icon-basic-elaboration-tablet-pencil', 'basic-elaboration-tablet-picture' => 'icon-basic-elaboration-tablet-picture', 'basic-elaboration-tablet-refresh' => 'icon-basic-elaboration-tablet-refresh', 'basic-elaboration-tablet-search' => 'icon-basic-elaboration-tablet-search', 'basic-elaboration-todolist-2' => 'icon-basic-elaboration-todolist-2', 'basic-elaboration-todolist-check' => 'icon-basic-elaboration-todolist-check', 'basic-elaboration-todolist-cloud' => 'icon-basic-elaboration-todolist-cloud', 'basic-elaboration-todolist-download' => 'icon-basic-elaboration-todolist-download', 'basic-elaboration-todolist-flagged' => 'icon-basic-elaboration-todolist-flagged', 'basic-elaboration-todolist-minus' => 'icon-basic-elaboration-todolist-minus', 'basic-elaboration-todolist-noaccess' => 'icon-basic-elaboration-todolist-noaccess', 'basic-elaboration-todolist-pencil' => 'icon-basic-elaboration-todolist-pencil', 'basic-elaboration-todolist-plus' => 'icon-basic-elaboration-todolist-plus', 'basic-elaboration-todolist-refresh' => 'icon-basic-elaboration-todolist-refresh', 'basic-elaboration-todolist-remove' => 'icon-basic-elaboration-todolist-remove', 'basic-elaboration-todolist-search' => 'icon-basic-elaboration-todolist-search', 'basic-elaboration-todolist-star' => 'icon-basic-elaboration-todolist-star', 'basic-elaboration-todolist-upload' => 'icon-basic-elaboration-todolist-upload'));
  }
}

/**
 *
 * Set WPAUTOP for shortcode output
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_set_wpautop' ) ) {
  function rs_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/**
 *
 * element values post, page, categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_element_values' ) ) {
  function rs_element_values(  $type = '', $query_args = array() ) {

    $options = array();

    switch( $type ) {

      case 'pages':
      case 'page':
      $pages = get_pages( $query_args );

      if ( !empty($pages) ) {
        foreach ( $pages as $page ) {
          $options[$page->post_title] = $page->ID;
        }
      }
      break;

      case 'posts':
      case 'post':
      $posts = get_posts( $query_args );

      if ( !empty($posts) ) {
        foreach ( $posts as $post ) {
          $options[$post->post_title] = lcfirst($post->ID);
        }
      }
      break;

      case 'tags':
      case 'tag':

	  if (isset($query_args['taxonomies']) && taxonomy_exists($query_args['taxonomies'])) {
		$tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
		  if ( !is_wp_error($tags) && !empty($tags) ) {
			foreach ( $tags as $tag ) {
			  $options[$tag->name] = $tag->term_id;
		  }
		}
	  }
      break;

      case 'categories':
      case 'category':

	  if (isset($query_args['taxonomy']) && taxonomy_exists($query_args['taxonomy'])) {
		$categories = get_categories( $query_args );
		if ( !empty($categories) && is_array($categories) ) {

		  foreach ( $categories as $category ) {
			$options[$category->name] = $category->term_id;
		  }
		}
	  }
      break;

      case 'custom':
      case 'callback':

      if( is_callable( $query_args['function'] ) ) {
        $options = call_user_func( $query_args['function'], $query_args['args'] );
      }

      break;

    }

    return $options;

  }
}
/**
 *
 * Get Bootstrap Col
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_get_bootstrap_col' ) ) {
  function rs_get_bootstrap_col( $width = '' ) {
    $width = explode('/', $width);
    $width = ( $width[0] != '1' ) ? $width[0] * floor(12 / $width[1]) : floor(12 / $width[1]);
    return  $width;
  }
}

/**
 * Get font choices for theme options
 * @param bool $return_string if true returned array is strict, example array item: font_name => font_label
 * @return array
 */
if(!function_exists('rs_get_font_choices')) {
  function rs_get_font_choices($return_strict = false) {
    $aFonts = array(
      array(
        'value' => 'default',
        'label' => esc_html__('Default', 'adios-addons'),
        'src' => ''
      ),
      array(
        'value' => 'Verdana',
        'label' => 'Verdana',
        'src' => ''
      ),
      array(
        'value' => 'Geneva',
        'label' => 'Geneva',
        'src' => ''
      ),
      array(
        'value' => 'Proxima Nova',
        'label' => 'Proxima Nova',
        'src' => ''
      ),
      array(
        'value' => 'Arial',
        'label' => 'Arial',
        'src' => ''
      ),
      array(
        'value' => 'Arial Black',
        'label' => 'Arial Black',
        'src' => ''
      ),
      array(
        'value' => 'Trebuchet MS',
        'label' => 'Trebuchet MS',
        'src' => ''
      ),
      array(
        'value' => 'Helvetica',
        'label' => 'Helvetica',
        'src' => ''
      ),
      array(
        'value' => 'sans-serif',
        'label' => 'sans-serif',
        'src' => ''
      ),
      array(
        'value' => 'Georgia',
        'label' => 'Georgia',
        'src' => ''
      ),
      array(
        'value' => 'Times New Roman',
        'label' => 'Times New Roman',
        'src' => ''
      ),
      array(
        'value' => 'Times',
        'label' => 'Times',
        'src' => ''
      ),
      array(
        'value' => 'serif',
        'label' => 'serif',
        'src' => ''
      ),
    );

    if (file_exists(RS_ROOT . '/composer/google-fonts.json')) {

      $google_fonts = file_get_contents(RS_ROOT . '/composer/google-fonts.json', true);
      $aGoogleFonts = json_decode($google_fonts, true);

      if (!isset($aGoogleFonts['items']) || !is_array($aGoogleFonts['items'])) {
        return;
      }

      $aFonts[] = array(
        'value' => 'google_web_fonts',
        'label' => '---Google Web Fonts---',
        'src' => ''
      );

      foreach ($aGoogleFonts['items'] as $aGoogleFont) {
        $aFonts[] = array(
          'value' => 'google_web_font_' . $aGoogleFont['family'],
          'label' => $aGoogleFont['family'],
          'src' => ''
        );
      }
    }

    if ($return_strict) {
      $aFonts2 = array();
      foreach ($aFonts as $font) {
        $aFonts2[$font['value']] = $font['label'];
      }
      return $aFonts2;
    }
    return $aFonts;
  }
}

/**
 *
 * Walker Category
 * @since 1.0.0
 * @version 1.1.0
 *
 */
class Walker_Portfolio_List_Categories extends Walker_Category {

  function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {

    $has_children = get_term_children( $category->term_id, 'portfolio-category' );
    var_dump($category);

    if( empty( $has_children ) ) {
      $cat_name = esc_attr( $category->name );
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link     = '<li data-filter=".'. strtolower( $category->slug ) .'">';
      $link    .= $cat_name;
      $link    .= '</li>';
      $output  .= $link;
    }

  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {}

}

/**
 * Get custom term values array
 * @param type $type
 * @return type
 */
function rs_get_custom_term_values($type) {

	$items = array();
	$terms = get_terms($type, array('orderby' => 'name'));
	if (is_array($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$items[$term -> name] = $term -> term_id;
		}
	}
	return $items;
}

/**
 *
 * Animations
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_get_animations' ) ) {
  function rs_get_animations() {

    $animations = array(
      '',
      'bounce',
      'flash',
      'pulse',
      'rubberBand',
      'shake',
      'swing',
      'tada',
      'wobble',
      'jello',
      'bounceIn',
      'bounceInDown',
      'bounceInLeft',
      'bounceInRight',
      'bounceInUp',
      'bounceOut',
      'bounceOutDown',
      'bounceOutLeft',
      'bounceOutRight',
      'bounceOutUp',
      'fadeIn',
      'fadeInDown',
      'fadeInDownBig',
      'fadeInLeft',
      'fadeInLeftBig',
      'fadeInRight',
      'fadeInRightBig',
      'fadeInUp',
      'fadeInUpBig',
      'fadeOut',
      'fadeOutDown',
      'fadeOutDownBig',
      'fadeOutLeft',
      'fadeOutLeftBig',
      'fadeOutRight',
      'fadeOutRightBig',
      'fadeOutUp',
      'fadeOutUpBig',
      'flipInX',
      'flipInY',
      'flipOutX',
      'flipOutY',
      'lightSpeedIn',
      'lightSpeedOut',
      'rotateIn',
      'rotateInDownLeft',
      'rotateInDownRight',
      'rotateInUpLeft',
      'rotateInUpRight',
      'rotateOut',
      'rotateOutDownLeft',
      'rotateOutDownRight',
      'rotateOutUpLeft',
      'rotateOutUpRight',
      'hinge',
      'rollIn',
      'rollOut',
      'zoomIn',
      'zoomInDown',
      'zoomInLeft',
      'zoomInRight',
      'zoomInUp',
      'zoomOut',
      'zoomOutDown',
      'zoomOutLeft',
      'zoomOutRight',
      'zoomOutUp',
      'slideInDown',
      'slideInLeft',
      'slideInRight',
      'slideInUp',
      'slideOutDown',
      'slideOutLeft',
      'slideOutRight',
      'slideOutUp'
    );

    $animations = apply_filters( 'rs_animations', $animations );
    return $animations;

  }
}

/**
 * Get animation array
 * @param type $type
 * @return type
 */
if(!function_exists('rs_get_animation_param')) {
  function rs_get_animation_param($animation_param, $group) {
    return array(
      'type'        => 'dropdown',
      'heading'     => 'Animation',
      'param_name'  => $animation_param,
      'admin_label' => true,
      'value'       => rs_get_animations(),
      'group'       => $group
    );

  }
}

/**
 * Get animation delay
 * @param type $type
 * @return type
 */
if(!function_exists('rs_get_animation_delay_param')) {
  function rs_get_animation_delay_param($delay_param, $group, $dependency) {
    return array(
      'type'               => 'textfield',
      'heading'            => 'Animation Delay',
      'param_name'         => $delay_param,
      'edit_field_class'   => 'vc_col-md-6 vc_column',
      'value'              => '',
      'dependency'         => array( 'element' => $dependency, 'not_empty' => true ),
      'group'              => $group
    );

  }
}

/**
 * Get animation duration
 * @param type $type
 * @return type
 */
if(!function_exists('rs_get_animation_duration_param')) {
  function rs_get_animation_duration_param($duration_param, $group, $dependency) {
    return array(
      'type'               => 'textfield',
      'heading'            => 'Animation Duration',
      'param_name'         => $duration_param,
      'edit_field_class'   => 'vc_col-md-6 vc_column',
      'value'              => '',
      'dependency'         => array( 'element' => $dependency, 'not_empty' => true ),
      'group'              => $group
    );

  }
}

/**
 * Get space array
 * @param type $type
 * @return array
 */
if(!function_exists('rs_get_space_array')) {
  function rs_get_space_array() {
    $space_array = array('Select Height' => '');
    for($i = 0; $i < 215;) {
      $space_array[] = $i;
      $i = $i + 5;
    }
    return $space_array;
  }
}


