<?php
add_filter('the_title', 'dummy_title');
function dummy_title($title)
{
    $dummies = [
        'ダミーニュース１',
        'ダミーニュース２',
        'ダミーニュース３',
        'ダミーニュース４',
    ];
    return $dummies[rand(0,3)];
}

add_filter('get_the_date', 'dummy_date',0,3);
function dummy_date($the_date, $d, $post)
{
    $dummy_time = mktime(0, 0, 0, date("m"), date("d")-rand(0,60),   date("Y"));
    return date($d,$dummy_time);
}

add_filter('the_content', 'dummy_content',0,3);
function dummy_content($content)
{
    $dummy = <<<EOF

EOF;

    return $content;
}

//add_filter('get_the_eyecatch','dummy_eyecatch',10,4);
function dummy_eyecatch($null, $post_id = null, $size = 'large', $noimage = true) {
    switch ($size) {
        case 'full':
            $d_size = '1600/1200';
            break;
        case 'large':
            $d_size = '1280/860';
            break;
        case 'medium':
            $d_size = '750/562';
            break;
        case 'thumbnail':
            $d_size = '160/160';
            break;
    }
    return 'http://placeimg.com/'.$d_size.'/nature?rand='.rand(1,36);
}