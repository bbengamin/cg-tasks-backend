## Tasks Backend

> Make sure to install docker   

### Run the application locally
```
docker-compose up -d
```

### Migration and seeders
```
php artisan migrate --seed
```

### Generate Postman collection
```
php artisan export:postman 
```
Generated collection location - `/storage/app/postman/laravel_collection.json`
