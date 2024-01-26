<h1>
<br>
<div align="center">
    <img src="images/search.png" height="90">
    <p >Enhanced Search System</p>
</div>

  
  
</h1>

<br>


## Introduction 

robust backend module to enhance search functionality and improve performance using Redis caching and Elasticsearch indexing.

## Installation

 1- Clone the repository:
   ```sh
   git clone https://github.com/your-username/your-repository.git
   ```

2- Install dependencies:

```shell
composer install
```

3- Copy the .env.example file to .env and configure your database settings.

4- Run migrations:
```shell
php artisan migrate
```
5- Run seeders:
```shell
php artisan db:seed --class=CrewTableSeeder
php artisan db:seed --class=GenreTableSeeder
php artisan db:seed --class=MovieTableSeeder
```
## Contributing

Pull requests are welcome. For major changes, please open an <a href="https://github.com/2x-Hra/enhanced-search-system/issues"> issue here </a> first
to discuss what you would like to change.


## License
This project is licensed under the MIT License - see the [LICENSE](https://choosealicense.com/licenses/mit/) file for details.

[MIT](https://choosealicense.com/licenses/mit/)

