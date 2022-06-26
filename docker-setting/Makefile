# 以下の内容でdockerのコマンド入力を単純にしています。
# （例：dockerのコンテナ起動時は「make start」と入力するだけで、コンテナが起動します）

# dockerのイメージを作成
build:
	docker compose build

# dockerのコンテナを作成
up:
	docker compose up -d

start:
	docker compose start

stop:
	docker compose stop

down:
	docker compose down

ps:
	docker compose ps

restart:
	docker compose restart

# コンテナ・イメージ・ボリュームを全て削除
delete:
	docker compose down --rmi all --volumes --remove-orphans