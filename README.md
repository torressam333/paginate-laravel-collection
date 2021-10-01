# Laravel Paginate Collection

Description:

Allows laravel users to paginate a collection via a global helper method. Currently laravel only allows for native query builder pagination.

Usage:

As a simple inline example I created a fresh Laravel project using:
``laravel new MyProject``

In `MyProject`:

1. Set up an `.env` file which connects to a local database.
2. Run the out-of-the-box migrations making sure the `users` table is created.
3. Use `tinker` to create some test users in the `users` table or create them manually in your DB

To test you can call this method globally and pass in your collection. 
Other method parameters are optional. 
Accepted parameters include:
1. `$collection` => Required
2. `$perPage` => Default is 15 but also accepts an `int`
3. `$currentPage` => Default is null but also accepts an `int`
4. `$options` => Any additional options you wish to pass

Below is an example use case of how to use the `paginate_collection` global helper method.

Follow steps 1-3 above and then create a route in `web.php` which has a callback `function` which will allow you to return a collection for testing
```
Route::get('/users', function() {
   $userCollection = User::all();

   $paginatedUsersCollection = paginate_collection(
       $userCollection,
       10,
       null
   );
   
   dd($paginatedUsersCollection);
});
```

Output 
```
Illuminate\Pagination\LengthAwarePaginator {#251 ▼
  #total: 2
  #lastPage: 1
  #items: Illuminate\Support\Collection {#265 ▶}
  #perPage: 10
  #currentPage: 1
  #path: "/"
  #query: []
  #fragment: null
  #pageName: "page"
  +onEachSide: 3
  #options: []
}
```

As you can see it uses the `LengthAwarePaginator` behind the scenes and your collection is now paginated.

