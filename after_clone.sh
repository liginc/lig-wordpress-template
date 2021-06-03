#!/usr/bin/env bash
cd $1
LF=$'\\\x0A'
sed -i.bak "s|.sass(|.webpackConfig({${LF}        module: {${LF}            rules: [{${LF}                test: /\\\.scss/,${LF}                enforce: 'pre',${LF}                loader: 'import-glob-loader'${LF}            }]${LF}        }${LF}    })${LF}   .sass(|g" webpack.mix.js
rm -f webpack.mix.js.bak