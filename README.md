# fatoorahPackage

> composer require fatoorahpayment/gatewayintegration

# Guide of use

- ### config file
- ### token from the .env
- ### api endpoints

## config file

please run this command to publish the config file that has essential keys

> php artisan vendor:publish --tag=myfatoorah-config

- after you publish your config file you will find key `test_mode` its value is `true` as default you can change it to `false` if you want to turn to live mode

- there are `api_token_key` key this key will have your token from myfatoorah account it have defualt token for test you can overwrite it any time later for your live token

> please remember to add the key `MYFATOORAH_API_TOKEN_KEY` to your .env file in your project

## api endpoints

- [for the Gateway integreation](#)
  ### there are two main endpoint
  - Call `initial_data()` endpoint (optional step) => post request,
    * when you call this endpoint you have to send this keys request
    ```json 
        {
            "InvoiceAmount": 879564546546,  // this is your amount you want
            "CurrencyIso": "KWD"    // and this is the currency you prefer
        }
    ```
    
  - Call `execute_payment()` endpoint: => post request
    * the request you have to send is 
    ```json
        {
        "PaymentMethodId": 6, // this one you will get from the initial_data() endpoint
        "CustomerName": "fname lname",
        "DisplayCurrencyIso": "KWD",
        "MobileCountryCode": "965",
        "CustomerMobile": "12345678",
        "CustomerEmail": "mail@company.com",
        "InvoiceValue": 10,
        }
    
    ```

# steps for creating this package

- ### create new laravel project
- ### packages folder
- ### composer init
- ### your composer.json file structure
- ### your package structure
- ### source code
- ### publish the package
- ### submit your package to [packagist.org](https://packagist.org/)

# references

- ### [publish-laravel-packagist](https://pusher.com/tutorials/publish-laravel-packagist/#creating-the-bare-bones-of-the-package)

- ### [laravel-docs-packages](https://laravel.com/docs/10.x/packages)

- ### [myfatoorah-docs](https://docs.myfatoorah.com/docs)

- ### [git tags references](https://www.atlassian.com/git/tutorials/inspecting-a-repository/git-tag)

- ### [write README file tutorial](https://medium.com/@saumya.ranjan/how-to-write-a-readme-md-file-markdown-file-20cb7cbcd6f)

# some useful commands

- git tag // fetch all tags
- git tag {tag-name ex. v1.0.1} // create new tag
- git tag -d {tag name or many tags } delete one or many tags
- git push origin {tag name} // to push the tag you created after commit your updates 

## create laravel project

create your required version of laravel framework project, its preferable to be the latest version

## packages folder

inside the base path of the created project

- create packages folder
- inside it create your prefered vendor name {any name you'd like } (this will be the vendor name of the package that composer will be creating )
- inside the vendor folder create your package folder {give it any name you'd prefer}

## composer init

- after finishing previous steps navigate to your package folder and run this command [composer init](##composer-init)
- ## this command will define the composer inside your package folder
- and will create src folder , your specific composer.json for this package
- then will ask you for details like your package name , description, etc

## your composer.json file structure

your composer.json file should be like something like this

```json
{
  "name": "your-vendor-name/your-package-name",
  "minimum-stability": "dev",
  "prefer-stable": true,
  "version": "1.0.0",
  "description": "your package description ",
  "type": "library", // this will be one  of reserved key [library , project , etc what ever your package type will be ]
  "license": "MIT", // your licence type will be here
  "homepage": "https://github.com/crazyideaco/fatoorahPackage", //your-package-github-repo link
  "keywords": ["laravel", "gateway", "fatoorah", "payment"], //key words that want to be found with on packagist.org
  "autoload": {
    "psr-4": {
      "Fatoorahpayment\\Gatewayintegration\\": "src/"
    }
  },
  "authors": [
    {
      /** 
            its prfered to be your git username, email
            you may add this key homepage: and add your website url
            */
      "name": "crazyideaco",
      "email": "crazyideacompany@gmail.com"
    }
  ],
  /**
     require and require-dev keys for the used or needed packages 
     */
  "require": {
    "illuminate/support": "*"
  },
  "require-dev": {
    "illuminate/support": "*"
  },
  "extra": {
    "laravel": {
      "providers": [
        "Fatoorahpayment\\Gatewayintegration\\GatewayintegrationServiceProvider"
      ]
    }
  }
}
```

## your package structure && source code

- it should be inside src folder
- create your prefered package structure that you will build
  it may be something like this

```json
    Fatoorahpayment
        └── Gatewayintegration
            └── src
                ├── Database
                │   └── migrations
                ├── Http
                │   └── controllers
                ├── Models
                ├── resources
                │   └── views
                └── routes


```

or what ever structure your want

- inside this sturcture your put your source code of the package

## publish the package

- inside the package folder run the git command [git init](#publish-the-package)

- create your git repo whether it's github, gitlab, gitbucket ,etc
- commit your code
- push it
- after pushing your package create tag based on your package version [git tag v1.0.0](#publish-the-package) then [git push --tags](#publish-the-package)

- after pushing your tags goto your repo and create release based on your tag

- **keep in mind that packagist keep track of the releases from your github and if you want to update your package you need to push to the main and your tag of the release**

- **also the version key in your package composer.json file need to be the same as the release title**

- **tags dont't accept updates so each update to the package you will creat tag for it**

- > please keep this in your mind the tags are not updateable so if you want to update the package , so after implementing your updates **remember to update the `version` key in your composer.json file**

## submit your package to [packagist.org](https://packagist.org/)

make sure your git repo has only the code or folders inside your package-name folder

then login to the packagist then submit your repo clone link
