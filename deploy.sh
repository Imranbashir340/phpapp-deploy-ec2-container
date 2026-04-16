#!/bin/bash
set -e

if [ -z "${DOCKER_USERNAME}" ]; then
  echo "ERROR: DOCKER_USERNAME is not set."
  echo "Set DOCKER_USERNAME in environment or GitHub secrets."
  exit 1
fi

IMAGE="${DOCKER_USERNAME}/php-ec2-app:latest"

echo "Checking Docker..."
if ! command -v docker >/dev/null 2>&1; then
  echo "Docker not found. Installing..."
  sudo apt update -y
  sudo apt install -y docker.io
  sudo systemctl start docker
  sudo systemctl enable docker
fi

echo "Stopping old container..."
docker stop php-app >/dev/null 2>&1 || true
docker rm php-app >/dev/null 2>&1 || true

echo "Pulling latest image: ${IMAGE}"
docker pull "${IMAGE}"

echo "Running container..."
docker run -d -p 80:80 --name php-app "${IMAGE}"

echo "Deployment complete ✔"
