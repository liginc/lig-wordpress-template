<?php
/**
 * LightsailとLightsail CDNを使う際の設定です
 *
 * 2020.10.02
 * @ryotamoriyama
 *
 *
 * Usage
 *
 * 1. functionsディレクトリにSDKをcomposerでいれる
 * composer require aws/aws-sdk-php
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/getting-started_installation.html
 *
 * 2. CLI用のIAMユーザーを作る
 * クリデンシャルは1Passなどに入れておく
 * ポリシーは下記の通り
 * {
 * "Version": "2012-10-17",
 * "Statement": [
 * {
 * "Sid": "VisualEditor0",
 * "Effect": "Allow",
 * "Action": "lightsail:ResetDistributionCache",
 * "Resource": "*"
 * }
 * ]
 * }
 *
 * 3. wp-config.phpに定数を設置（本番のみ）
 * アクセスキー、シークレット、ディストリビューション名を入れる
 * define('WP_AWS_CLIENT_VERSION','latest');
 * define('WP_AWS_LS_CDN_REGION','us-east-1');
 * define('WP_AWS_LS_CDN_CACHE_CLEAR', true);
 * define('WP_AWS_LS_CDN_USER_ACCESS_KEY','{ACCESS_KEY_HERE}');
 * define('WP_AWS_LS_CDN_USER_SECRET','{SECRET_HERE}');
 * define('WP_AWS_LS_CDN_DISTRIBUTION_NAME','{DISTRIBUTION_NAME_HERE}');
 *
 * 4. wp-cronの停止（本番のみ）
 * wp-config.phpに下記１行を追加
 * define('DISABLE_WP_CRON', 'true');
 *
 * 5. crontabでwp-config.phpを叩く
 * crontab -e
 * * * * * * apache /opt/bitnami/php/bin/php /home/bitnami/apps/wordpress/htdocs/wp-cron.php > /dev/null 2>&1
 *
 *
 * CDNの設定
 *
 * キャッシュしない項目
 * wp-json/*
 * wp-admin/*
 * wp-login.php
 *
 * ヘッダー転送
 * host
 * Authorization （管理画面にBasic認証を入れる場合のみ）
 *
 * Cookie の転送
 * ->指定するCookieを転送する
 * wordpress_*
 * wp-settings-*
 * mw-wp-form_* （MW WP Formを使っている場合のみ）
 *
 * クエリ文字列の転送
 * p
 * post_type
 * preview
 * preview_id
 * preview_nonce
 *
 */

use Aws\Exception\AwsException;
use Aws\Lightsail\LightsailClient;

add_action('transition_post_status', 'lig_check_post_update', 10, 3);

function lig_check_post_update($new_status, $old_status, $post)
{
    if (empty(WP_AWS_LS_CDN_CACHE_CLEAR) || !(('publish' === $new_status) || ('publish' === $old_status && $new_status !== $old_status))) return;
    if( ! wp_next_scheduled( 'lig_reset_cdn_cache_cron' ) ) {
        wp_schedule_single_event(time() + 60, 'lig_reset_cdn_cache_cron');
    }
}

add_action('lig_reset_cdn_cache_cron', 'lig_reset_cdn_cache');

function lig_reset_cdn_cache()
{
    require_once(STYLESHEETPATH . '/functions/vendor/autoload.php');

    $client = new LightsailClient([
        'version' => WP_AWS_CLIENT_VERSION,
        'region' => WP_AWS_LS_CDN_REGION,
        'credentials' => [
            'key' => WP_AWS_LS_CDN_USER_ACCESS_KEY,
            'secret' => WP_AWS_LS_CDN_USER_SECRET,
        ],
    ]);

    try {
        $result = $client->resetDistributionCache([
            'distributionName' => WP_AWS_LS_CDN_DISTRIBUTION_NAME,
        ]);
    } catch (AwsException $e) {
        echo $e->getMessage() . "\n";
    }
}