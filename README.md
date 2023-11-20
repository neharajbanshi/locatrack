Table of Contents

1. [Installation](#installation)
2. [Access on browser](#accessing-on-the-browser)

### Installation

Requirements

1. Docker


**Run the project**

1. Clone using ssh or https
2. cd [project_directory]
3. docker-compose build
4. docker-compose up -d

### Verify if is running or not

Run, the docker ps command and verify that port are exposed on the application

```
docker ps
```

### Running the migrations
1. docker exec -it php bash
2. php artisan migrate

### Importing CSV to Mysql container

Run the following steps:
1. cd [project_directory]
2. docker cp Data.csv mysql:/usr/src
3. docker exec -it mysql bash
4. mysql --local-infile=1 -u root -p
    [PWD for root is secret]
5. Use location_tracker;
6. SET GLOBAL local_infile = true;
7. LOAD DATA LOCAL INFILE '/usr/src/Data.csv' INTO TABLE `location` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' (`address`, `city`, `state`, `zip`, `latitude`, `longitude`);

### Accessing on the browser

Open the browser and type following url to access the data:

```
    http://localhost/locations
```


