# tableware_share

## 環境の前提

- docker/docker-composeのインストールが完了している
```
brew cask install docker
brew install docker-compose
```
- Gitコマンドが使える
```
brew install git
```
- githubのCollaboratorsに招待されている。
  - されていない時は教えてください。

## はじめに
この環境ではHomeディレクトリの中にasoフォルダを作りその中にプロジェクトを作成しています
なのでディレクトリは自身の環境に合わせて読み替えてください。

### 開発おすすめツール
- Sequel Pro/DataGrip
  - DB管理

- Sourcetree 
  - Git管理

- Postman/Insomnia
  - APIのテスト簡略化


## 環境を作成する

- ディレクトリの作成

```
mkdir ~/aso
cd ~/aso
```

- GitHubからcloneする

```
git clone https://github.com/kaitowada/tableware_share.git
```

- developの最新ブランチを取得

```
cd ~/aso/tableware_share
git checkout develop
git pull origin develop
```

- 環境のBuild

```
docker-compose up
docker-compose run --rm nuxt yarn
docker-compose run --rm laravel composer install
```
DBのseedを実行する
- 環境の起動

```
docker-compose up
```
※下記のエラーが出る場合は無視してよい
```
DeprecationWarning: Tapable.plugin is deprecated. Use new API on `.hooks` instead
```

- DBのマイグレーション
docker-compose upをした状態で下記を実行
```
docker-compose run --rm laravel php artisan migrate
```

- Seedの実行
docker-compose upをした状態で下記を実行
```
docker-compose run --rm laravel composer dump-autoload
docker-compose run --rm laravel php artisan db:seed
```
