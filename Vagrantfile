# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  #Webserver create
  config.vm.define "web" do |web|
     
    #general config
    web.vm.box = "ubuntu/bionic64"

    
    #Netconfig
    web.vm.network "private_network", ip: "192.168.1.50",
    virtualbox_intnet: true

    #Vmspecs Web
    web.vm.provider "virtualbox" do |vb_web|
      vb_web.name = "Webserver_M300"
      vb_web.memory = "2048"


    end
  end

    #DBserver create
  config.vm.define "DB" do |db|

     #general config
    db.vm.box = "ubuntu/bionic64"

    #Netconfig
    db.vm.network "private_network", ip: "192.168.1.55",
    virtualbox_intnet: true

    #Vmspecs DB
    db.vm.provider "virtualbox" do |vb_db|
      vb_db.name = "DBserverr_M300"
      vb_db.memory = "2500"


    end
  end
end

