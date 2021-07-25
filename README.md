# Cloud Computing - Assignment 1
This repository contains source code for a simple employee management app that uses various of Google Cloud Platform's (GCP) services:

- Google App Engine (GAE)
- Google Data Storage
- Google BigQuery

For this app to works with GCP, a authentication key is required. Follow **Createing a service account** section from [this web page](https://cloud.google.com/docs/authentication/production) to obtain a JSON key file. Save that key file as `key.json` in `src` folder.

There are two options for running the app.

## Option 1. Run inside docker containers
First, create a image of the Lumen app:
```
docker build -t thanhlongb/asm1 .
```

Then, open `docker-compose.yml` and configure the `CLOUD_PROJECT_ID` and `CLOUD_BUCKET_ID` according to your GCP setups.

Next, run the following command:
```
docker-compose up -d
```

Wait for the command to finish and go to [localhost:8000](localhost:8000) to check the result.

## Option 2: Deploy to Google App Engine

Open `src/app.yaml` and configure the `CLOUD_PROJECT_ID` and `CLOUD_BUCKET_ID` according to your GCP setups.

Then, run the following code to deploy:
```
docker app deploy ./src/
```

That's it! Have fun.