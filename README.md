# 株式会社ネストエッグ wordpress

## Dependence

* [PHP](https://secure.php.net/) 7.1以上
* [Node.js](https://nodejs.org/ja/) 8.11.1以上

## Server(prod & stage)

* クラウドホスティング
    * conoha VPS
* IPアドレス
    * 150.95.186.83

↑のりさん確認

## Directory structure

* docker
 `docker構成ファイル`
* app
 `ドキュメントルート`
* sql
 `DBdumpデータ`
* node
 `scssやjsファイルのソースコード格納場所`

## Get Started (Docker)

### dockerをインストール

[MacOS docker](https://docs.docker.com/docker-for-mac/install/)

### ビルド
ホームディレクトリでこちらを実行してください。
```
$ docker-compose build
```

### 起動
ホームディレクトリでこちらを実行してください。

ログを表示する場合はこちら
```
$ docker-compose up
```
ターミナルのログを表示しない場合はこちら
```
$ docker-compose up -d
```

### 停止
```
$ docker-compose down
```

### 開発

- ユニット
	- http://localhost

- phpMyAdmin(ユニット)
	- http://localhost:8888

- テスト
  - http://localhost:8080/index.html

- phpMyAdmin(テスト)
	- http://localhost:8889

- MailHog
	- http://localhost:8025


### docker関連のコマンド

Dockerコンテナ一覧表示

```
$ docker ps -a
```

Dockerコンテナ一括削除

```
$ docker rm `docker ps -a -q`
```

Docker イメージの一括削除

```
docker rmi `docker images | sed -ne '2,$p' -e 's/  */ /g' | awk '{print $1":"$2}'`
```

初期のデータベースを更新

```
$ docker exec finbee_media_mysql /usr/bin/mysqldump -u root --password=password wordpress > sql/wordpress.sql
```
WP CLIを使う

```
$ docker exec office officelab-ka_php /usr/local/bin/wp --info
```
※ rootで実行するため--allow-rootオプションを付けてください

[使い方はこちら](http://wp-cli.org/ja/)

URLを変更する([new hostname]に新しいホスト名を入れてください)
```
$ docker exec office officelab-ka_php /usr/local/bin/wp search-replace 'localhost:8888' '[new hostname]' --skip-columns=guid --allow-root --dry-run
```
※ 本番実行の際は--dry-runを外して実行してください

### Node.jsのインストール

[公式サイト](https://nodejs.org/ja/)より「推奨版」をDLしてインストールしてください。

### 依存モジュールのインストールと初回ビルド

`$ docker-compose up` した際に自動的に `$ npm install` 及び `$ npm run build` が実行され、依存モジュール（node_modules）のインストールとJS/SCSSのビルドが実行されます。

※初回はインストール/ビルドに時間がかかるので完了までお待ちください

```
$ docker-compose up
```

### JS/SCSS開発の開始

docker-compose up を行なっている状態で、node/src配下のscss,jsを変更すると、自動的にapp配下にコンパイルしたcss,jsが作成されます。


## 開発状況  

### scss  
components,utilis,entriesの3つのディレクトリに分かれている。 
componentsは、アトミックデザインでいうコンポーネント粒度に該当するものを格納。 
utilisは、reset.cssや変数定義を行なったりするファイルを格納。  
entriesは、ページ単位でのスタイル寮生を行うファイルを格納している。(アトミックデザインでいうpages)  

### プラグイン関連 
 
#### OneSignal(WEBプッシュ通知)
WEBプッシュ通知は、Onesignalというプラグインを使用している。  
また独自の実装部分は、function/onesignal.phpにフィルターフックで記載。  
アカウント  
ID:contact@be-topia.finbee.jp  
PW:NEstEgg1101  
 
#### ランキング機能
simpleGArankingというプラグインを使用している。
権限を持っているアカウントは、クライアントが持っているため、サイトドメイン変更時などは、クライアントとの連携対応が必要になる。  
閲覧権限だけならば、GIG社内ディレクターなども持っている。  

#### 広告関連  
広告は、  
- 純広告  
- アドセンス広告  
の2種類ある。  