#!/bin/bash
#
#	Datenbank installieren und Konfigurieren
#
#Set Root Password
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password Plokijuhz480"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password Plokijuhz480"

# Installation
sudo apt-get update
sudo apt-get install -y mysql-server

# Open MySQL Port
sudo sed -i -e"s/^bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf

#Grant Remote Access but only for 192.168.1.50
mysql -uroot -pPlokijuhz480 <<%EOF%
	CREATE USER "trj"@"192.168.1.50" IDENTIFIED BY "Qawsedrft123";
	GRANT ALL PRIVILEGES ON *.* TO "trj"@"192.168.1.50";
	FLUSH PRIVILEGES;


    CREATE DATABASE UserDB;
	USE UserDB;
    CREATE TABLE user(userID int auto_increment, name varchar(30), lastname varchar(30), age int, primary key(userID));
    
%EOF%

# Restart fuer Konfigurationsaenderung
sudo service mysql restart
