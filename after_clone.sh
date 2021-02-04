#!/usr/bin/env bash
cd $1
npm i import-glob-loader reset-css sanitize.css smoothscroll-polyfill viewport-extra
sed -i.bak "s|.sass(|.webpackConfig({\n        module: {\n            rules: [{\n                test: /\\\.scss/,\n                enforce: 'pre',\n                loader: 'import-glob-loader'\n            }]\n        }\n    })\n    .sass(|g" webpack.mix.js
rm -f webpack.mix.js.bak
rm -Rf node_modules
