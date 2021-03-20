# Font

## 設定

`00_constants/03_font.scss` の連想配列`$font` に各フォントのパターンを定義する。 

キー`sp` 内はmedia_queryでラップされたデータが出力される

また、パターン`base` はHTML要素に適用される（`04_pages/00_global/00_base.scss`内）

## 呼び出し

利用したい箇所で`mixin font($type);`を実行する

```scss
.index__heading {
  @include font(heading_01);
}
```



# Easing

## 設定

`00_constants/02_easing.scss` の連想配列`$easing` に各イージングのパターンを定義する。 

デフォルトでは https://easings.net/ja のパターンが用意されている

## 呼び出し

利用したい箇所で`function ease($type);`を実行する

```scss
.index__heading {
  transition: all .5s ease(easeInOutBack) 1s;
}
```
