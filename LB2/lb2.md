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
VirtualBox 6.1.32 Umgebung und Vagrant 2.2.19 mit einem Windows Host

- **Webserver: Webserver_M300**
  - Ubuntu/Bionic64
  - Memory: 2048MB
  - Software: Apache2 webserver
  - IP & Port 192.168.1.50 guest: 80, host 11930

- **Datenbankserver: DBserver_M300**
  - Ubuntu/Bionic64
  - Memory: 2048MB
  - Software: MySQL DB
  - IP & Port 192.168.1.55:3306

### 20 Netzwerkplan
Als erstes, habe ich einen Netzwerkplan erstellt um alles richtig aufzubauen

![screen](images/network.png)

### 30 Codebeschreibung

##### Mit Vagrant VMs erstellen:

```
Vagrant.configure("2") do |config| 
```
Dieser Befehl muss am Anfang jedes Vagrant files stehen, dieser startet die "do" Schlaufe.
```
  #Webserver create 
  config.vm.define "web" do |web| 
```
Hier wird der eigentliche Server erstellt/definiert (web kann in unserem Fall auch durch DB ersetzt werden)
     
```
#vm config
web.vm.box = "ubuntu/bionic64"
web.vm.synced_folder "./sh_web", "/sh_f_web"
 ```

    
```
#Netconfig
web.vm.network "private_network", ip: "192.168.1.50",
virtualbox_intnet: true
web.vm.network "forwarded_port", guest: 80, host: 11930
```

 ```
   #Vmspecs Web
    web.vm.provider "virtualbox" do |vm_web|
      vm_web.name = "Webserver_M300"
      vm_web.memory = "2048"
```
```
  end
```

##### Installationen auf dem <mark>**Webserver**</mark>:

  * ```apt-get update``` (Installiert die neuen Updates für das Ubunutu)
  * ``` apt-get install -y apache2``` (Installiert Apache. Apache ist ein Webserver)
  * ```apt-get install -y php libapache2-mod-php php-mysql``` (Installiert ein PHP-Modul, damit der Webserver kommunizieren kann)
  * ``` apt-get install -y mysql-client ``` (Installiert den MySQL Client)
  * ```rm -rf /var/www/html/index.html``` (Entfernt den Standard HTML-File.)
  * ```cp /sh_f_web/index.html /var/www/html``` (Webformular wird dem Linux Ordner hinzugefügt)
  * ```cp /sh_f_web/userinfo.php /var/www/html``` (PHP-File wird dem Ordner hinzufügt.)




           
     
      
      
     
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
Ja, alles hat funktioniert wie man an den folgenden Screenshots sehen kann:

![screen](images/Form.png)
</br>
Das ist die Dateneingabe-Maske auf der Datenbank

![screen](images/erfolgreiche_eingabe.png)
</br>
Die Dateneingabe auf der Website war erfolgreich

![screen](images/db_eintrag.png)
</br>
Hier sieht man, dass die Daten erfolgreich in der Datenbank gespeichert wurden.

### 60 Fazit
Es war ein sehr spannendes Modul, denn ich hatte absolut keine Erfahrung mit Vagrant. Deshalb war ich sehr glücklich in einer solch guten Gruppe gewesen zu sein, die mir helfen konnte. Am Schluss hat alles perfekt so funktioniert, wie wir es geplant haben. Das einzige, was ich eventuell hätte verbessern können wäre die Gestaltung der Website, da jedoch laut dem Lehrer nur die Funktionalität zählt, habe ich das Websiten-Design vernachlässigt.
