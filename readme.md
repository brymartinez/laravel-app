## Requirements

Docker & docker-compose. Installation instructions can be found below:

[Docker for Mac](https://docs.docker.com/v17.12/docker-for-mac/install/#download-docker-for-mac)
[Docker for Windows](https://docs.docker.com/v17.12/docker-for-windows/install/)

[Docker-Compose (All platforms)](https://docs.docker.com/compose/install/)

## Instructions

Docker automates the entire build process for a working Laravel environment.

After pulling the repo, use ./start.sh to start the Docker container.

## Removal

To shut off the container, issue the following command on the repo folder:

`docker-compose down`


To remove all volumes created by Docker, issue the following command:

`docker system prune --volumes`

This mostly removes external volumes as defined by the volumes section in your `docker-compose.yml` file.


To remove all containers created by Docker, issue the following command:

`docker system prune -a`

NOTE: This will remove all containers that were created by ./start.sh, which means it will have to download all of them again.