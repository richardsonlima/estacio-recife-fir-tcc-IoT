Projeto: Estacio-Recife-fir-TCC-IoT - 2016.2
=========

Um simples e seguro, sistema de gerenciamento IoT com autenticação, usando PHP, MySQL and jQuery (AJAX), Bootstrap 3 e Python para controle do dispositivo IoT.

<img src="https://raw.githubusercontent.com/richardsonlima/estacio-recife-fir-tcc-IoT/master/screenshotsimages/screenshot.png" alt="Login Page Screenshot" />

## Preparando o ambiente
### 

### Banco de dados

Cria a database "login" e crie em seguida as tables "members" e "loginAttempts" usando o exemplo abaixo:

```sql
CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `loginAttempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```


### Arquivo de configuração do banco `login/dbconf.php`  

```php
<?php
    //Variaveis de conexao
    $host = "localhost"; // Host name
    $username = "user"; // Mysql username
    $password = "password"; // Mysql password
    $db_name = "login"; // Database name

```

