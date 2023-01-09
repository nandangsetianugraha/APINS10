<h1 align="center">APINS Generasi 10</h1>

Penggabungan Penilaian Kurikulum 2013 dan Kurikulum Merdeka dalam satu aplikasi.

[Demo page](https://apins.sdi-aljannah.web.id/)

![Demo Page screenshot](https://sdi-aljannah.web.id/cdn/login-beranda.png)

## Table of contents

  * [Features](#features)
  * [Installation](#installation)
  * [Importing](#importing)
  * [Usage](#usage)
  * [Customization](#customization)
  * [API](#api)
  * [Responsive images](#responsive-images)
  * [Compatibility](#compatibility)
  * [Contributing](#contributing)
  * [Donation](#donation)
  * [Credits](#credits)
  * [License](#license)

## Installation
* buat database
* ubah settingan database pada file db_connect.php dan db.php di folder config
* ubah baris 11 pada file index.php sesuaikan nilainya dengan params url
misalnya diinstal di domain www.domain.com maka ubah $params[3] menjadi $params[1] 
* ubah baris 12 $tipe = count($params)>4 ? $params[4] : ''; menjadi $tipe = count($params)>2 ? $params[2] : '';
