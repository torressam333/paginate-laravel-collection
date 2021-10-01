# Laravel Paginate Collection

Description:

Allows laravel users to paginate a collection via a global helper method. Currently laravel only allows for native query builder pagination.
Once installed via composer this helper method will be available globally.

Usage:

As a simple inline example I created a fresh Laravel project using:
``laravel new MyProject``

In `MyProject`:

1. Set up an `.env` file which connects to a local database.
2. Run the out-of-the-box migrations making sure the `users` table is created.
3. Use `tinker` to create some test users in the `users` table or create them manually in your DB

To test you can call this method globally and pass in your collection. Other parameters are optional.
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
   
   dd($paginatedUsers);
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

