![COMRADES Logo](Associated_Files/COMRADES_logo.png)
# The COMRADES Platform
This repository holds the code for the COMRADES platform: an open‐source, community resilience platform, to help communities reconnect, respond to, and recover from crisis situations. The project website for this [COMRADES H2020 European Project can be found here](http://www.comrades-project.eu). It contains a variety of outputs from the project such as [specific documentation within reports](http://www.comrades-project.eu/outputs/deliverables.html), access to our [training data and ontologies](http://www.comrades-project.eu/outputs/datasets-and-ontologies.html), and [academic research](http://www.comrades-project.eu/outputs/papers.html).  

COMRADES is built on the Ushahidi platform. To use this code, follow the instructions for installing Ushahidi, then see our COMRADES manual for instructions on configuring all of the necessary services. 

### What is Ushahidi?
Ushahidi is an open source web application for information collection, visualization and interactive mapping. It helps you to collect info from: SMS, Twitter, RSS feeds, E-mail. It helps you to process that information, categorize it, geo-locate it and publish it on a map. Please see our Installation Guide to get set up first. For more information see [the Ushahidi website](https://www.ushahidi.com).

## Configuration Manual
The [Configuration & Set-up Manual for the COMRADES Platform can be found here](https://s3-eu-west-1.amazonaws.com/comradesmanual/Comrades+Manual/COMRADES+Config+Setup+Manual.pdf). 

## List of Comrades repositories and how they fit together

### Description of the system
The code for the Ushahidi Platform is open source. The Comrades Platform uses a specific edition of the platform, containing advanced features to display results from the services integrated in the comrades-service-proxy and send data to other platforms.

### Applications
Backend application
The backend application implements the server side of the Comrades system. The backend application runs in a server.
Setup instructions can be found in its own repository. 

Repository: https://github.com/ushahidi/platform-comrades

#### Web client application
The web client is the component that end users interact with when opening the system website with a web browser. The web client interacts with the backend in order to perform operations on the system (i.e. submit posts, query posts).
The web client runs in the users’ browsers.
Setup instructions can be found in its own repository. 

Repository: https://github.com/ushahidi/platform-client-comrades

#### Comrades Service Proxy
The service proxy interacts with the backend application (platform-comrades) to process the content of posts submitted by users. It fetches information from external services such as YODIE, CREES and EMINA where content from the platform is processed to be augmented with extra information or categorized depending on the service called, and then sends that information back to the platform-comrades service.
The service proxy runs in a server, it can be run either in the same server or a different one. The platform URL and other configuration settings can be changed through an .ENV file in the service proxy. 
Setup instructions can be found in its own repository

Repository:  https://github.com/ushahidi/comrades-service-proxy

#### Facebook Bot
The Facebook bot is used for communicating with users through facebook-messenger. Users can create reporrts by chatting with the bot and they are then sent back to the platform, wheere they can be processed by the service proxy if the user configures the webhooks for it. 
The Facebook bot runs in a server, it can be run either in the same server or a different one. The platform URL and other configuration settings can be changed through an .ENV file in the repository. 
Setup instructions can be found in its own repository

Repository:  https://github.com/ushahidi/platform-facebook-bot

## Acknowledgment
This work has received support from the European Union’s Horizon 2020 research and innovation programme under [grant agreement No 687847](http://cordis.europa.eu/project/rcn/198819_en.html).

## Getting Involved
We welcome contributions to our code! Ushahdi maintains a variety of communications channels to help contributors. Please see [our support page on the Ushhaidi website](https://www.ushahidi.com/support/get-involved) for more details on how to contribute. 

