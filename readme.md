# demo-laravel-crud

[![Build Status](https://travis-ci.org/sutara79/demo-laravel-crud.svg?branch=5.7)](https://travis-ci.org/sutara79/demo-laravel-crud)
[![codecov](https://codecov.io/gh/sutara79/demo-laravel-crud/branch/5.7/graph/badge.svg)](https://codecov.io/gh/sutara79/demo-laravel-crud)


My practice for basic CRUD of Laravel 5.7 with Heroku.


## Demo
https://sutara79-laravel.herokuapp.com/

## Step
- rename .env.examaple to .env
- run command : composer install --ignore-platform-reqs


## Documentation
(Japanese)
https://qiita.com/sutara79/items/ef30fcdfb7afcb2188ea


## Feature
- All visitors can read all posts.
- All visitors can read all users' profile except email address.
- All visitors can sign up.
- Each the logged in user can post, edit and delete.
- The admin can edit and delete all users' accounts and posts.
    - Admin:
        - id: 1
        - name: sutara79
        - email: toumin.m7@gmail.com
        - password: 1234
    - User:
        - id: 2
        - name: foo1
        - email: foo1@foo.com
        - password: 1234


## License
[MIT](http://www.opensource.org/licenses/mit-license.php)


## Author
[Yuusaku Miyazaki](https://qiita.com/sutara79/items/ef30fcdfb7afcb2188ea)
( <toumin.m7@gmail.com> )
