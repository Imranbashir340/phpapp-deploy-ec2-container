# PHP App Deploy EC2 Container

A simple PHP application packaged in Docker, designed for deployment to EC2 via GitHub Actions.

## Files

- `Dockerfile` - Builds the PHP/Apache container image.
- `index.php` - Sample PHP app showing environment info.
- `deploy.sh` - EC2 deployment script used by GitHub Actions.
- `setup.sh` - Local helper script for building and running the app locally.

## Local usage

Build and run locally:

```bash
bash setup.sh
```

Then open `http://localhost` in your browser.

## GitHub Actions deployment

The workflow `.github/workflows/deploy.yml` does the following:

1. Builds the Docker image.
2. Pushes it to Docker Hub.
3. SSHs into your EC2 host and runs `deploy.sh`.

### Required GitHub secrets

- `DOCKER_USERNAME`
- `DOCKER_PASSWORD`
- `EC2_HOST`
- `EC2_USER`
- `EC2_SSH_KEY`

## EC2 deployment script

The `deploy.sh` script expects `DOCKER_USERNAME` to be set on the EC2 instance or provided by the workflow, then pulls and runs the latest image.

## Notes

- Rename `dockerfile` to `Dockerfile` so Docker build works correctly.
- If you want to customize the image name, update the scripts and workflow accordingly.
