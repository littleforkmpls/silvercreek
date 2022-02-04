# Silver Creek Equity

Silver Creek Equity is a WordPress site originally developed in 2022 to showcase real estate properties.

## Tech Notes

* Originally built on WordPress 5.9.0
* Uses a custom built theme
* Hosted on WPEngine

## Helpful Links

* https://github.com/marketplace/actions/deploy-wordpress-to-wp-engine
* https://wpengine.com/support/ssh-gateway/#Add_SSH_Key

## Initial Setup

1. Create Hosting account on WPEngine
1. Setup a prod and stage site using WPEngine admin panel
1. Create an ssh keypair for WPEngine Deployment
1. Add private key to the GitHub Repository Secrets using the name `WPE_SSHG_KEY_PRIVATE`
1. Add public key to WPEngine SSH Gateway Key settings
1. Make sure `.gitignore` is setup to ignore files you don't want to deploy
1. Create `.github/workflows/main.yml` and mimic the example
1. Add the WPEngine environment names and GitHub branch names to `.github/workflows/main.yml`

## Local Development

1. Clone the repo from github
1. Checkout the `develop` branch
1. Switch to the project root directory
1. Run `docker compose up -d`
1. Create `app/wp-config.php` and fill in the appropriate values
1. Download the database from WPEngine
1. Import the database from production into the local database

Note: Run `docker compose down` when local development is complete.

## Deployments

**Production**

1. Commit changes to the `develop` branch
1. Merge the `develop` branch into the `main` branch
1. Push `main` branch to GitHub
1. GitHub action will deploy to production and clear the cache
1. Visit https://scequity.wpengine.com/ to view changes
