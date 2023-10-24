# MyShelf

あってよかったをあなたへ

アプリURL：[MyShelf](https://myshelfuserhavebook-845cc2f808f9.herokuapp.com/)へ移動  

![myshelf](https://github.com/Tatsuki0623/my_shelf/assets/135039862/28048cba-2027-4c80-b63a-88b210fe0b24)

## 概要

予定外に本屋に行くことになった際、本を何巻まで買ったかわからず**二度買い**や**買い忘れ**てしまったことはありませんか？本アプリでは本の登録機能を用いてそういったことを防ぐアプリです！  
本を登録することで**出先**でも本を何巻まで買ったのかの把握ができます。また、登録するのが楽しくなるような機能によって登録のし忘れも防げます。

## 機能

##### CRUD処理

・本の登録機能  
・メモの追加機能  
・読書時間の登録  

#### ECサイトとの連結
・楽天API  
　　新刊検索  
　　楽天商品ページとの連結  

#### 外部ライブラリ
・chartjs  
　読書時間の棒グラフ  
　本の統計情報の円グラフ  
Copyright (c) 2014 Chart.js Contributors  
Released under the MIT license：[MITライセンス](https://opensource.org/license/mit/) 

・quaggajs  
　isbnコードの読み取り  
Copyright (c) 2014 quggajs Christoph Oberhofer  
Released under the MIT license：[MITライセンス](https://opensource.org/license/mit/)  

#### ログイン機能(breeze)  
・メールでのユーザー認証機能  
・自動ログイン機能  

#### DB
・ユーザーのお気に入り機能(多対多)  
・SUM、COUNT関数を用いたDBの統計処理  
・ペジネーションによる取得  
・一対多のリレーションを用いた情報の取得  
・orderByによるソート機能  

## 動作環境
・ネットワークにつなげられるデバイス。

## 使用例

以下にPDFファイル形式で使い方が記述されていますのでダウンロードして閲覧してください。

[MyShelf使い方ガイド.pdf](https://github.com/Tatsuki0623/my_shelf/files/12908861/MyShelf.pdf)

## 開発環境

#### 使用した言語

・HTML  
・css  
・JavaScript    
・PHP(8.0.30)  

#### フレームワーク

・laravel(9.52.15)  
・Tailwind  

#### パッケージ管理ツール

・composer(2.5.8)  
・npm(8.19.4)  

#### DB

・Mysql(開発環境)  
・PostgreSQL(本番環境)

#### API
・楽天ブックス総合検索API
<!-- Rakuten Web Services Attribution Snippet FROM HERE -->
<a href="https://webservice.rakuten.co.jp/" target="_blank"><img src="https://webservice.rakuten.co.jp/img/credit/200709/credit_22121.gif" border="0" alt="Rakuten Web Service Center" title="Rakuten Web Service Center" width="221" height="21"/></a>
<!-- Rakuten Web Services Attribution Snippet TO HERE -->
#### SDK  
・rws-php-sdk  
　Copyright (c) 2012 Shogo Kawahara rws-php-sdk  
　Released under the MIT license：[MITライセンス](https://opensource.org/license/mit/)


## ER図

![MyShelf_ER](https://github.com/Tatsuki0623/my_shelf/assets/135039862/5adc7848-8ea0-4304-9097-d2483b843760)

## 工夫した点  

・楽天APIを用いた検索を行う際にタイトルがsampleの場合sampleに関連するグッズなどといった本以外の商品も取得してきてしまい
データ量が多くなることがありました。そこでisbnコードを用いた検索をできるようにしたり、bookGenreIdで漫画と小説を分けて指定することによって
求めていたデータを取り出しやすくしました。

![rakutenAPI](https://github.com/Tatsuki0623/my_shelf/assets/135039862/a9fff2f6-0764-4caa-995d-d37822c0d655)

・本の評価を表示する際、モデル内の連想配列に配列を追加する処理でコードが助長で読みにくい、100件のデータを点数ごとに連想配列に格納する際にメモリ使用量が大きく504 Gateway Timeout エラーが出てしまい
ページが読み込めないといったことが起きていました。そこで追加する配列を連想配列にすることでメモリ使用量を大幅に減らすことができた。  

#### 変更前  
![変更前](https://github.com/Tatsuki0623/my_shelf/assets/135039862/d471b087-834e-4bd8-8627-592b269f94d2)  

#### 変更後  
![変更後](https://github.com/Tatsuki0623/my_shelf/assets/135039862/2d854418-7079-40ed-b028-01e061e1b0ef)  

・本を登録することが楽しくなるように以下の写真のように統計情報の可視化を行いました。
#### 本の登録数の可視化
![MyShelf - Google Chrome 2023_10_15 14_53_40](https://github.com/Tatsuki0623/my_shelf/assets/135039862/7c8cfad7-27f5-4829-adb7-ee53b9fc9e0c)

#### 本のジャンルごとの登録数の割合
![MyShelf - Google Chrome 2023_10_15 14_53_45](https://github.com/Tatsuki0623/my_shelf/assets/135039862/d7839747-0f27-43ad-acca-53c13f8d68f0)

#### 本の全数の割合
![MyShelf - Google Chrome 2023_10_15 14_53_48](https://github.com/Tatsuki0623/my_shelf/assets/135039862/5950e6c3-8144-4c5b-982a-a73438ccb35e)

## 今後の課題

・このアプリでは途中の巻数を買っていないとなった時にそれを視覚的に確認する方法が本の感想欄に書いておくかメモに追加しておくしかできない。そのためこれを視覚的に確認できる機能を追加することが
課題であると認識しておりどのように実装するかを構想している段階です。

## 開発者

・今給黎　樹  
・2002/09/29  
・明星大学理工学部総合理工学科環境科学系　3年
