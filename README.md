# The COMRADES Platform
This repository holds the code for the COMRADES platform: an open‐source, community resilience platform, to help communities reconnect, respond to, and recover from crisis situations. The project website for this [COMRADES H2020 European Project can be found here](http://www.comrades-project.eu). It contains a variety of outputs from the project such as [specific documentation within reports](http://www.comrades-project.eu/outputs/deliverables.html), access to our training [data and ontologies](http://www.comrades-project.eu/outputs/datasets-and-ontologies.html), and [academic research](http://www.comrades-project.eu/outputs/papers.html).  

COMRADES is built on the Ushahidi platform. To use this code, follow the instructions for installing Ushahidi, then see our COMRADES manual for instructions on configuring all of the necessary services. 

### What is Ushahidi?
Ushahidi is an open source web application for information collection, visualization and interactive mapping. It helps you to collect info from: SMS, Twitter, RSS feeds, E-mail. It helps you to process that information, categorize it, geo-locate it and publish it on a map. Please see our Installation Guide to get set up first.

## Configuration Manual
here <- Content for manual

## List of Comrades repositories and how they fit together

### Description of the system
The code for the Ushahidi Platform is open source. The Comrades Platform uses a specific edition of the platform, containing advanced features to display results from the services integrated in the comrades-service-proxy and send data to other platforms such as humdata.org .

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

