## Tasks Backend

> Make sure to install docker   

### Run the application locally
```sh
docker-compose up -d
```

### Migration and seeders
```sh
php artisan migrate --seed
```

### Generate Postman collection
```sh
php artisan export:postman 
```
Generated collection location - `/storage/app/postman/laravel_collection.json`

### Run tests
```sh
php artisan test
```
