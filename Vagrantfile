# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  #Webserver create
  config.vm.define "web" do |web|
     
    #general vm config
    web.vm.box = "ubuntu/bionic64"
    web.vm.synced_folder "./sh_web", "/sh_f_web"

    
    #Netconfig
    web.vm.network "private_network", ip: "192.168.1.50",
    virtualbox_intnet: true
    web.vm.network "forwarded_port", guest: 80, host: 8080

    #Vmspecs Web
    web.vm.provider "virtualbox" do |vb_web|
      vb_web.name = "Webserver_M300"
      vb_web.memory = "2200"


    end
       # 
       web.vm.provision "shell", inline: <<-SHELL
       apt-get update
       apt-get install -y apache2
     SHELL
     
  end

    #DBserver create
  config.vm.define "DB" do |db|

     #general config
    db.vm.box = "ubuntu/bionic64"
    db.vm.synced_folder "./sh_db", "/sh_f_db"

    #Netconfig
    db.vm.network "private_network", ip: "192.168.1.55",
    virtualbox_intnet: true
    db.vm.network "forwarded_port", guest: 3306, host: 33306

    #Vmspecs DB
    db.vm.provider "virtualbox" do |vb_db|
      vb_db.name = "DBserver_M300"
      vb_db.memory = "2500"


    end
    db.vm.provision :shell, path: "Database.sh"
  end
end

