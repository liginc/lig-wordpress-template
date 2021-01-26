#!/usr/bin/env bash
cd $1
npm i import-glob-loader lazyload reset-css sanitize.css smoothscroll-polyfill viewport-extra
rm -Rf node_modules