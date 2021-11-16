# LIG WordPress Sample Theme 

**Theme Name:** LIG WordPress Template  
**Theme URI:** https://github.com/liginc/lig-wordpress-template  
**Contributors:** LIG inc  
**Requires at least:** WordPress 5.5.2
**Version:** 0.3 
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  
**Tags:** scratch  

## Description

The theme is scratch to start developing original theme.  

## Copyright

LIG WordPress Template, Copyright 2019 LIG inc
LIG WordPress Template is distributed under the terms of the GNU GPL.

LIG WordPress Template bundles the following third-party resources:

_s, Copyright 2015-2018 Automattic, Inc. 

**License:** GPLv2 or later
Source: https://github.com/Automattic/_s/

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal

**License:** MIT
Source: https://necolas.github.io/normalize.css/

--- 

# SCSS

## Structure

```
├── 00_constants
│   ├── _00_break-point.scss // ブレークポイントを定義
│   ├── _01_color.scss // 色を定義
│   ├── _02_easing.scss // イージングを定義
│   └── _03_font.scss // フォントを定義
├── 01_functions
│   ├── _00_functions.scss // funtionを定義
│   ├── _01_mixins.scss // mixinを定義
│   └── _02_extends.scss // extendを定義
├── 02_settings
│   ├── _00_reset-extra.scss // sanitize.cssとreset.cssで解消できない問題をリセット
│   └── _02_keyframes.scss // キーフレームを定義
├── 03_parts
│   ├── _breadcrumbs.scss
│   ├── _button.scss
│   ├── _hamburger.scss
│   ├── _pagination.scss
│   ├── _sns-menu.scss
│   ├── _sns-share.scss
│   ├── _tag-list.scss
│   ├── footer
│   │   ├── _footer-menu.scss
│   │   └── _footer.scss
│   └── header
│       ├── _header-menu.scss
│       └── _header.scss
├── 04_pages
│   ├── 00_global
│   │   ├── _00_base.scss
│   │   ├── _01_form.scss
│   │   └── _03_editor.scss // Goutenbergで出力されるタグのスタイリング
│   └── index
│       └── _index.scss
├── 99_utilities
│   ├── _00_class.scss
│   ├── _01_is-status.scss
│   ├── _02_utilities.scss
│   └── _03_font.scss
└── app.scss

```

## BreakPoint 

`00_constants/00_easing.scss` の連想配列`$break-point` に各イージングのパターンを定義する 

呼び出しはfunction`bp($mode)` $modeにキーを渡す

## MediaQuery

### mixins
`01_functions/01_mixins.scss` にMediaQuery用のmixinが定義されている

#### mq($mode:break, $type: max)

$modeに$break-pointのキー、$typeに`max`または`min`を指定する

デフォルトの挙動は`max-width:767px`

使用例：

```scss
// 768以下はフォントサイズを小さくする
h1 {
  font-size: 24px;
  @include mq() {
    font-size: 18px;
  }
}
```

#### mq_min($mode:break)
mixin`mq()`の第二引数がデフォルトで`min`にセットされているショートハンド

`mq_min(break)`と`mq(break,min)`は同じ

#### min($mode:break)
`mq_min()`のエイリアス

#### mq_max($mode:break)
mixin`mq()`の第二引数がデフォルトで`max`にセットされているショートハンド

`mq_max(break)`と`mq(break,max)`は同じ

#### max($mode:break)
`mq_max()`のエイリアス

#### mq_between($min-mode,$max-mode)
`(min-width: px) and (max-width: px)`を出力する

引数には$break-pointのキーを渡す

#### between($min-mode,$max-mode)
`mq_between()`のエイリアス

#### pc($mode:break)
引数を渡さない場合、`min-width:768px`を出力する

#### sp($mode:break)
引数を渡さない場合、`man-width:767px`を出力する

使用例：

```scss
// 768のbreakpointで.wrapperのスタイルを変更する
.wrapper {
  // pc min-width:768px
  @include pc() {
    max-width: 80vw;
    margin: 0 auto;
  }
  // sp max-width:767px
  @include sp() {
    padding: 0 20px;
  }
}

// リキッドのカラムの数とmargin-rightを画面幅で変更する
$margin:20px;
.article-item {
  margin-right: $margin;
  
  // 1440以上は4カラム min-width: 1440
  @include min(pc) {
    width: calc(( 100% - ($margin * 3 ) / 4 );
    &:nth-child(4n) {
      margin-right: 0;
    }
  }
  
  // 1024以上、1439以下は3カラム  min-width: 1024 and max-width: 1439
  @include between(tab,pc) {
    width: calc(( 100% - ($margin * 2 ) / 3 );
    &:nth-child(3n) {
      margin-right: 0;
    }
  }
  
  // 768以上、1023以下は2カラム  min-width: 768 and max-width: 1023
  @include between(break,tab) {
    width: calc(( 100% - ($margin * 1 ) / 2 );
    &:nth-child(2n) {
      margin-right: 0;
    }
  }
  
  // 767以下は1カラム max-width: 767
  @include sp() {
    width: 100%;
    margin-right: 0;
  }
}

```

## Fonts

### Constants

`00_constants/03_font.scss` の連想配列`$font` に各フォントのパターンを定義する 

キー`sp` 内はmedia_queryでラップされたデータが出力される

また、パターン`base` はHTML要素に適用される（`04_pages/00_global/00_base.scss`内）

### mixin

#### font($type:base)

使用例：

```scss
.index__heading {
  @include font(heading_01);
}
```

## Sizes

### mixins
`01_functions/00_functions.scss` にfunctionが定義されている

ベストビューデザインのピクセルから、vw・vhを算出するのに使用する

#### vw($size, $mode:pc)
デフォルトでは1440px幅時のvwを返す

#### vw_sp($size,$mode:sp)
デフォルトでは375px幅時のvwを返す

#### vh($size,$height:$pc-bestview-height)
デフォルトでは900px高時のvhを返す

#### vh_sp($size,$height:$sp-bestview-height)
デフォルトでは667px高時のvhを返す

使用例：
```scss
// デザイン上、上下30px、左右60pxのpaddingを持つデザインを、同じ比率のまま画面幅に応じて可変させたい時
.l-main {
  padding: vh(30) vw(60);
  @include sp() {
    // レスポンシブ
    padding: vh_sp(20) vw_sp(30);
  }
}
```

## Easing

### Constants

`00_constants/02_easing.scss` の連想配列`$easing` に各イージングのパターンを定義する 

デフォルトでは https://easings.net/ja のパターンが用意されている

### Function

#### ease($type:$base-ease)

使用例：
```scss
.index__heading {
  transition: all .5s ease(easeInOutBack) 1s;
}
```

## Utility

### Lineclamp

記事などのタイトル、本文が長い時に省略させるために使用する。

使用例：
```scss
.index__article {
  @include line-clamp(3);
}
```

### Hover

hover可能な端末に絞ったhoverイベントを指定させるために使用する。

使用例：
```scss
.hoge {
  opacity: 0;
  transition: opacity 1s;

  @include hover(){
    opacity: 1;
  };
}
```