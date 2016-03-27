# Codeigniter and MongoDB Integration
An Example of Integration between Codeigniter Framwork with MongoDB Database

### Requirments

- [PHP](http://php.net) version 5.4 or above
- [MongoDB PHP Driver](http://php.net/manual/en/set.mongodb.php) (PHP extension)
- [MongoDB Server](https://www.mongodb.org/downloads#production)

### Installation
We assume that you have already installed MongoDB Server and running it, also running Apache Server or other Server too

1. Download this source file as zip file and extract it
2. Create new Codeigniter Project (Version 2.x) under `www` or `htdocs` folder (depends of your server you've used)
2. Move the `application` folder and `.htaccess` file from extraction to a new project you've just created (just replace it)
3. Run it via accessing it in yur web browser
4. You can explore it.

> In this example we used indonesian language and we are sorry for that, but we are focused on fastest performance and how to integrate MongoDB with Codeigniter

### Important

This is not library or plugin, this is a CRUD Aplication to explain how to work with MongoDB and Codeigniter together.
The important things you must know is that the modification we've made in this project is:

1. This application use third-party library called [CIMongo - MongoDB Library for Codeigniter](https://github.com/intekhabrizvi/Codeigniter-mongo-library)
2. Option we've modified are:
  
  File | Options | Values
  ---- | ------- | ------
  config.php | `[index_page]` | (empty)
  config.php | `['encryption_key']` | `my_mongo_db123`
  autoload.php | `['libraries']` | `session`
  autoload.php | `['helper']` | `uri`
  mongo_db.php | `['mongo_db']['default']['no_auth']` | TRUE
  mongo_db.php | `['mongo_db']['default']['database']` | `myfirst_Mongo`
3. We've created file listed below:
  * `page.php` -> Controller
  * `siswa_model.php` -> Model
  * `home.php` -> View
4. We've write the code in three files above.

Then the rest is nothing changed.

### Credits
- [Codeigniter Framework](https://github.com/bcit-ci/CodeIgniter)
- [CIMongo - MongoDB Library for Codeigniter](https://github.com/intekhabrizvi/Codeigniter-mongo-library)

### License
##### The MIT License (MIT)
See the [license agreement](https://github.com/DykiSA/CI_MongoDB/blob/master/LICENSE)
