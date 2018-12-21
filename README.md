[download]: https://github.com/ushahidi/platform-release/releases
[install-development]: https://github.com/ushahidi/platform/blob/develop/README.md#Installing-for-development-vagrant
[other-install-guides]: docs/setup_alternatives
[docs]: https://www.ushahidi.com/support
[tech-docs]: ./docs/README.md
[getin]: https://www.ushahidi.com/support/get-involved
[issues]: https://github.com/ushahidi/platform/issues
[ush2]: https://github.com/ushahidi/Ushahidi_Web
[ushahidi]: http://ushahidi.com
[gitter]: https://gitter.im/ushahidi/Community

Ushahidi 3
============

[![Build Status](https://travis-ci.org/ushahidi/platform.png)](https://travis-ci.org/ushahidi/platform)
[![Coverage Status](https://coveralls.io/repos/github/ushahidi/platform/badge.svg)](https://coveralls.io/github/ushahidi/platform)



[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

## What is Ushahidi?

Ushahidi is an open source web application for information collection, visualization and interactive mapping. It helps you to collect info from: SMS, Twitter, RSS feeds, Email. It helps you to process that information, categorize it, geo-locate it and publish it on a map.

## A note for grassroots organizations
If you are starting a deployment for a grassroots organization, you can apply for a free social-impact responder account [here](https://www.ushahidi.com/plans/apply-for-free) after verifying that you meet the criteria.


## Getting Involved
There are many ways to get involved with Ushahidi, and some of them are great even for first time contributors. If you never contributed to Open Source Software before, or need more guidance doing it, please jump in our gitter channel with a clear description of what you are trying to do, and someone in there will try to help you.
These are some ways to get involved:

- **Documentation**: if you find an area of the Ushahidi platform that could use better docs, we would love to hear from you in an issue, and would be seriously excited if you send a [Pull Request](https://github.com/ushahidi/platform/compare). This is a great way to get involved even if you are not technical or just have a passion to make information more available and clear to everyone.
- **Report a bug**: If you found an issue/bug, please report it [here](https://github.com/ushahidi/platform/issues). Someone on the team will jump in to check it, try to help, and prioritize it for future development depending on the issue type.
- **Fix a bug**: If you want to contribute a fix for a bug you or someone else found, we will be happy to review your PR and provide support.
- **Helping other users in the community**: you are welcome and encouraged to jump in and help other members of the community, either by responding to issues in github or jumping into our community channels to answer questions. 
- **New features**: our features are generally driven by our product and engineering team members, but if you have a great idea, or found a user need that we haven't covered, you are more than welcome to make a suggestion in the form of a github issue [here](https://github.com/ushahidi/platform/issues), or reach out to Ushahidi staff in [gitter](https://gitter.im/ushahidi/Community)
- **Security issues**: if you think you have found a security issue, please follow 
[this link where we explain our disclosure and reporting policies](https://www.ushahidi.com/security)

## List of Comrades repositories and how they fit together
1. Description of the system
The code for the Ushahidi Platform is open source. The Comrades Platform uses a specific edition of the platform, containing advanced features to display results from the services integrated in the comrades-service-proxy and send data to other platforms such as humdata.org .

1.1. Applications
1.1.1. Backend application
The backend application implements the server side of the Comrades system. The backend application runs in a server.
Repository: https://github.com/ushahidi/platform-comrades

1.1.2. Web client application
The web client is the component that end users interact with when opening the system website with a web browser. The web client interacts with the backend in order to perform operations on the system (i.e. submit posts, query posts).
The web client runs in the users’ browsers.
Repository: https://github.com/ushahidi/platform-client-comrades

1.1.3 Comrades Service Proxy
The service proxy interacts with the backend application (platform-comrades) to process the content of posts submitted by users. It fetches information from external services such as YODIE, CREES and EMINA where content from the platform is processed to be augmented with extra information or categorized depending on the service called, and then sends that information back to the platform-comrades service.
The service proxy runs in a server, it can be run either in the same server or a different one. The platform URL and other configuration settings can be changed through an .ENV file in the service proxy. Setup instructions can be found in its own repository
Repository:  https://github.com/ushahidi/comrades-service-proxy

1.1.4 Facebook Bot
The Facebook bot is used for communicating with users through facebook-messenger. Users can create reporrts by chatting with the bot and they are then sent back to the platform, wheere they can be processed by the service proxy if the user configures the webhooks for it. 
The Facebook bot runs in a server, it can be run either in the same server or a different one. The platform URL and other configuration settings can be changed through an .ENV file in the repository. Setup instructions can be found in its own repository
Repository:  https://github.com/ushahidi/platform-facebook-bot


## Using the Platform

- If you are not a developer, or just don't want to set it up yourself, you can start a hosted deployment [here](https://www.ushahidi.com/).

# \[API\] Vagrant setup

### Installing the API

This guide relies heavily on Vagrant and assumes some previous knowledge of how to use and/or troubleshoot vagrant.


**If you want to learn more about vagrant, please refer to their docs here [https://www.vagrantup.com/intro/getting-started/index.html](https://www.vagrantup.com/intro/getting-started/index.html)**

### Prerequisites


**Please make sure you install everything in this list before you proceed with the platform setup.**

* [Vagrant](https://www.vagrantup.com/downloads.html)
* Recommended: [Vagrant host-updater plugin](https://github.com/cogitatio/vagrant-hostsupdater) - this is useful to avoid having to update /etc/hosts by hand
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads) - Note: Windows users may be required to Enable VT-X \(Intel Virtualization Technology\) in the computer's bios settings, disable Hyper-V on program and features page in the control panel, and install the VirtualBox Extension Pack \(installation instructions here.\)
* [Composer](https://getcomposer.org/doc/00-intro.md#system-requirements)
* PHP &gt;=7.0 &lt;7.2

#### Getting the API Code

Clone the repository \(this will create a directory named _platform-comrades\)_

```
git clone https://github.com/ushahidi/platform-comrades.git
```

Go into the platform directory

```
cd platform-comrades
```

Switch to the _master_ branch

```
git checkout master
```

**If you haven't used git before or need help with git specific issues, make sure to check out their docs here [https://git-scm.com/doc](https://git-scm.com/doc)**


#### Getting the web server running

Once you have the code, the next step is to prepare a web server. For this part, we will use vagrant, with the Vagrant and Homestead.yml files that ship with Ushahidi.

First up we need to install the PHP dependencies. In the _platform_comrades_ directory, run:

```
composer install --ignore-platform-reqs
```


**Without using --ignore-platform-reqs you might run into an error like "The requested PHP extension ... is missing from your system". That's ok. You don't need all the PHP extensions on your _host_ machine, since the vagrant setup already has them.**


**If you get a warning like "In MemcachedConnector.php line 69: Class 'Memcached' not found" at this point you can safely ignore it, we will come back to it later.**

Bring up the vagrant server. Since this is the first time you run it, it will also provision the machine from scratch:

```
vagrant up
```

Our vagrant box is built on top of Laravel's Homestead, a pre-packaged Vagrant box that provides a pre-built development environment. Homestead includes the Nginx web server, PHP 7.1, MySQL, Postgres, Redis, Memcached, Node, and all of the other goodies you might need.

If you see an error like "Vagrant was unable to mount VirtualBox shared folders...", try upgrading VirtualBox or edit Homestead.yaml and change the folders to NFS as shown below, then re-run "vagrant" up.


```
  -
      map: "./"
      to: /vagrant
      type: "nfs"
  -
      map: "./"
      to: /home/vagrant/Code/platform-api
      type: "nfs"
```

You will have to ssh into your vagrant machine to finish installing the dependencies.

```bash
vagrant ssh
```

```bash
cd ~/Code/platform-api
```

```bash
sudo update-alternatives --set php /usr/bin/php7.1
```

```bash
composer install
```


**Important:** If you didn't setup vagrant-hostupdater, you will need to add the following lines to /etc/hosts in your host machine.


```
192.168.33.110  platform-api
192.168.33.110  api.ushahidi.test
```


At this point you should have a running web server, but your deployment isn't set up yet. We still need to configure the database and run the migrations.

#### **Setting up the deployment's database**

* Copy the configuration file `.env.example` to make sure the platform can connect to the database. 

```bash
cp .env.example .env
```

* Run the migrations. This is required to be able to use your deployment, since it includes basic data such as an initial "admin" user, roles, the database schema itself, etc.

```bash
composer migrate
```

* Go to [http://192.168.33.110](http://192.168.33.110/) in your browser to check the API is up and running. You should see some JSON with an API version, endpoints and user info.

Example JSON

```javascript
{"now":"2018-11-06T19:18:23+00:00","version":"3","user":{"id":null,"email":null,"realname":null}}
```

## Installing With XAMPP
Follow the instructions [here](docs/setup_alternatives/XAMPP.md)

### `Installing the client`

The latest install instructions for the client are always [in the platform-client-comrades README, at this url](https://github.com/ushahidi/platform-client-comrades/blob/master/README.md).


## Useful Links

- [Download][download]
- [Other Installation Guides][other-install-guides]
- [User Documentation][docs]
- [Technical Documentation][tech-docs]
- [Get Involved][getin]
- [Bug tracker][issues]
- [Ushahidi][ushahidi]
- [Ushahidi Platform v2][ush2]
