## AHK

## Deployment
- Create 'BOWERPHP_TOKEN' system variable with a github token. This is required for the bowerphp to go above the GitHub API limit, and download libraries without  limitations. We use bowerphp instead of bower as to avoid to install any Node servers, etc.
- run migrations  

### Heroku
1. Run on terminal, where already logged in heroku toolbelt:  
`heroku config:add BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-multi.git`
2. Verify .buildpacks contains  
`https://github.com/heroku/heroku-buildpack-nodejs`  
`https://github.com/ejholmes/heroku-buildpack-bower`  
`https://github.com/heroku/heroku-buildpack-php`  
3. Ensure package.json npm installs:
```
 "dependencies": {
   "bower": "latest"
 }
```

