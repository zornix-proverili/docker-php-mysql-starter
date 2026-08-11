# Docker PHP + Apache + MySQL Starter

Docker Composeを使用して、PHP・Apache・MySQLをまとめて動かすためのスターター環境です。

This is a simple starter environment for running PHP, Apache, and MySQL with Docker Compose.

このリポジトリでは、Docker Composeを使ってPHP・Apache・MySQLをまとめて動かす構成を紹介します。

---

# Overview

This repository provides a simple example of how PHP, Apache, and MySQL can work together inside Docker.

このリポジトリでは、PHP・Apache・MySQLをDocker上で連携させる基本的な構成を紹介します。

The purpose of this repository is not to provide a complicated application.

このリポジトリの目的は、複雑なアプリケーションを作ることではありません。

It is designed to make the Docker environment easy to understand by separating each configuration into its own file.

それぞれの設定をファイルごとに分けることで、Docker環境の仕組みを分かりやすくしています。

---

# Environment

The environment consists of the following two main containers.

この環境は、主に以下の2つのコンテナで構成されています。

- PHP + Apache
- MySQL

PHP + Apache provides the web application.

PHP + ApacheはWebアプリケーションを提供します。

MySQL stores the application data.

MySQLはアプリケーションのデータを保存します。

Docker Compose manages both containers.

Docker Composeが2つのコンテナをまとめて管理します。

---

# Architecture

The basic architecture is shown below.

基本的な構成は以下のようになります。

PHP + Apache and MySQL are separated into different containers.

PHP + ApacheとMySQLは、それぞれ別のコンテナとして動作します。

The PHP application communicates with MySQL through the Docker network.

PHPアプリケーションはDockerネットワークを通してMySQLと通信します。

---

# Directory Structure

The repository uses the following directory structure.

このリポジトリでは、以下のディレクトリ構成を使用します。

~~~text
docker-php-mysql-starter/
│
├── README.md
├── compose.yaml
├── Dockerfile
├── .env.example
├── .gitignore
│
├── php/
│   └── php.ini
│
├── mysql/
│   └── init.sql
│
└── src/
    ├── db.php
    └── index.php
~~~

---

# File Overview

Each file has a specific role in the environment.

各ファイルには、それぞれ役割があります。

## `compose.yaml`

Defines the Docker services, ports, environment variables, volumes, and container relationships.

Dockerのサービス、ポート、環境変数、Volume、コンテナ同士の関係などを定義します。

---

## `Dockerfile`

Defines how the PHP + Apache Docker image is built.

PHP + ApacheのDockerイメージをどのように構築するかを定義します。

---

## `php/php.ini`

Contains additional PHP configuration used by the PHP + Apache container.

PHP + Apacheコンテナで使用する追加のPHP設定を記載します。

---

## `mysql/init.sql`

Creates the database structure and inserts initial data when MySQL is initialized.

MySQLの初期化時にデータベースの構造を作成し、初期データを登録します。

---

## `src/db.php`

Handles the connection between PHP and MySQL.

PHPとMySQLの接続処理を担当します。

---

## `src/index.php`

The PHP page displayed through Apache.

Apacheを通してブラウザに表示されるPHPファイルです。

---

## `.env.example`

Provides an example of the environment variables used by the project.

プロジェクトで使用する環境変数の設定例を記載します。

---

## `.gitignore`

Defines files and directories that should not be tracked by Git.

Gitで管理しないファイルやディレクトリを指定します。

---

# File Relationship

The main relationship between the files is shown below.

主要なファイルの関係は以下のようになります。

~~~text
compose.yaml
│
├── Dockerfile
│      │
│      └── PHP + Apache
│
├── php/php.ini
│      │
│      └── PHP configuration
│
├── src/
│      │
│      ├── index.php
│      │      │
│      │      └── db.php
│      │             │
│      │             └── MySQL
│      │
│      └── db.php
│
└── mysql/
       │
       └── init.sql
              │
              └── MySQL initialization

MySQL
│
└── ./data/
       │
       └── Persistent database data
~~~

---

# How PHP and MySQL Connect

PHP connects to the MySQL container using the MySQL service name defined in `compose.yaml`.

PHPは`compose.yaml`で定義したMySQLのサービス名を使用して、MySQLコンテナへ接続します。

The connection flow is:

接続の流れは以下です。

~~~text
Browser
   │
   ▼
Apache
   │
   ▼
src/index.php
   │
   ▼
src/db.php
   │
   ▼
MySQL Container
   │
   ▼
MySQL Database
~~~

---

# Data Persistence

MySQL data is stored outside the MySQL container.

MySQLのデータはMySQLコンテナの外側にも保存します。

The local directory is:

ローカル側のディレクトリは以下です。

~~~text
./data/
~~~

The MySQL container uses:

MySQLコンテナでは以下のディレクトリを使用します。

~~~text
/var/lib/mysql
~~~

These two locations are connected by a Docker volume.

この2つの場所をDocker Volumeで接続します。

~~~text
Local Computer
│
└── ./data/
       │
       │ Docker Volume
       ▼
MySQL Container
│
└── /var/lib/mysql
~~~

This allows the database data to remain outside the container.

これにより、データベースのデータをコンテナの外側に保存できます。

---

# Next

The next section explains the actual contents of each file.

次のセクションでは、実際に各ファイルへ記載するコードを説明します。

The files will be created in the following order.

ファイルは以下の順番で作成します。

~~~text
1. compose.yaml

2. Dockerfile

3. php/php.ini

4. mysql/init.sql

5. src/db.php

6. src/index.php

7. .env.example

8. .gitignore
~~~

