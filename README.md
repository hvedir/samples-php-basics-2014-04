# Code Samples from PHP base trainings


## Environment setup

### to feel the awesomeness and power of Vagrant based development you need:

#### Only once:

* Install [Oracle Virtualbox](http://www.oracle.com/technetwork/server-storage/virtualbox/downloads/index.html#vbox), also install [GuestAddition](http://www.oracle.com/technetwork/server-storage/virtualbox/downloads/index.html#extpack) for it (download on the same page)
* Install [Vagrant](http://www.vagrantup.com/downloads.html)
* [optionally] install vagrant plugin for your IDE/Editor (eg. [PhpStorm](http://www.jetbrains.com/phpstorm/), [NetBeans](https://netbeans.org/features/php/), [Sublime](http://www.sublimetext.com/3) etc)
* Run `vagrant up` (from command line or IDE) in this directory and wait until all magic taking place

##### Each time

* just run `vagrant resume` when start working with project (it takes few seconds)
* open http://localhost:8080 or http://192.168.56.101 in browser and ... enjoy :)
* when end run `vagrant suspend`

of course its the most basic usage example, free to do anything you want


### Some URL's:

#### *Note!* Vagrant-related and hidden/dotfiles are not listed in code explorer

* [/](http://localhost:8080/) - code explorer
* [/info.php](http://localhost:8080/info.php) - server phpinfo
