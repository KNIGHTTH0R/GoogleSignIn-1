# GoogleSignIn
Quick Start for Integrating Google Sign In to websites

## Setup

### Clone git repo:
```bash
git clone https://github.com/drtweety/GoogleSignIn.git
```
### Run Composer to install Google Sign In Library
```bash
composer install
```

Set values of `ClientId`, `ClientSecret`, `RedirectURI` and `scope` in `GoogleAuth.php`.

## Functions
`GoogleAuth::getAuthUrl()`: returns generated Sign In URL. | Returns `srting`

`GoogleAuth::checkRedirectCode()`: Validate Redirect Code, execute in RedirecURI file | Returns `bool`

`GoogleAuth::getPayload()`: Get's information of Signed In account | Returns `Array`

`GoogleAut::isLoggedIn()`: Check if user is logged in | Returns `bool`

`GoogleAuth::logout()`: Logs Out user
