#!/bin/bash

echo "Checking Docker..."

if ! command -v docker &> /dev/null
then
    echo "Docker not found. Installing..."
    sudo apt update -y
    sudo apt install docker.io -y
    sudo systemctl start docker
    sudo systemctl enable docker
    sudo usermod -aG docker ubuntu
fi

echo "Stopping old container..."
docker stop php-app || true
docker rm php-app || true

echo "Building local Docker image..."
docker build -t php-ec2-app:latest .

echo "Running container..."
docker run -d -p 80:80 --name php-app php-ec2-app:latest

echo "Deployment complete ✔"