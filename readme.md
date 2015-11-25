## AHK

## Deployment
- Create 'BOWERPHP_TOKEN' system variable with a github token. This is required for the bowerphp to go above the GitHub API limit, and download libraries without  limitations. We use bowerphp instead of bower as to avoid to install any Node servers, etc.
- run migrations