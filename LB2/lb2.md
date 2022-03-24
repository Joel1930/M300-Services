# Modul 300: Plattformübergreifende Dienste in ein Netzwerk integrieren
## Webbasierte Dateneingabe mit Datenbank im Hintergrund

### Projektbeschreibung
Der genaue Auftrag konnten die Teams selber bestimmen Als erstes haben wir die Teams gemacht und entschieden, was wir machen.

### Inhaltsverzeichnis:
* [10 Umgebung](#10-umgebung)
* [20 Netzwerkplan](#20-netzwerkplan)
* [30 Codebeschreibung](#30-codebeschreibung)
* [40 Wichtige Befehle](#40-wichtige-befehle)
* [50 Hat es funktioniert?](#50-hat-es-funktioniert)
* [60 Fazit](#60-fazit)

### 10 Umgebung
Vagrant 2.2.19 und VirtualBox 6.1 Umgebung mit Hostonly- und NAT-Netzwerkschnittstellen auf einem Windows Host:

- **Webserver: Webserver_M300**
  - ubuntu/bionic64
  - Memory 2048MB
  - Apache2 webserver
  - IP & Port 192.168.1.50 guest: 80, host 11930

- **Datenbankserver: DBserver_M300**
  - ubuntu/bionic64
  - Memory 2048MB
  - MySQL DB
  - IP & Port 192.168.1.55:3306

### 20 Netzwerkplan
Als erstes, habe ich einen Netzwerkplan erstellt um alles richtig aufzubauen


### 30 Codebeschreibung


```
Code
```



### 40 Wichtige Befehle
#### Befehlstabelle Vagrant
|Resultat    |Command                   |
|-------------------------|--------------------------|
|hochfahren / erstellen   |`vagrant up`              |
|herunterfahren           |`vagrant halt`            |
|löschen                  |`vagrant destroy`         |
|SSH Verbindung auf DB-Server   |`vagrant ssh DB`              |
|SSH Verbindung auf Web-Server           |`vagrant ssh web`            |


#### Befehlstabelle SQL
|Resultat  |Command                   |
|-------------------------|--------------------------|
|hochfahren / erstellen   |`mysql -uroot -p` und dann das Passwort             |
|Datebank auswählen          |`use UserDB;`            |
|Gibt Daten der Tabelle aus                |`select * from user;`         |


### 50 Hat es funktioniert

### 60 Fazit








