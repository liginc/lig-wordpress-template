#!/usr/bin/env bash
cd $1
npm i lazyload reset-css sanitize.css smoothscroll-polyfill viewport-extra
#SPLIT_PATH=(${1//\// })
#THEME=${SPLIT_PATH[@]: -1}
#mv wp/wp-content/themes/${THEME}/functions/extra/.php wp/wp-content/themes/${THEME}/functions/autoload/.php