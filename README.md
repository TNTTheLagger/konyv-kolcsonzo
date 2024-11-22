# Laravel Book Rental Management System

This is a Laravel application for managing book rentals. It allows users to view available books, rent a book, and manage book returns.




## Configuration

1. **Database:**

   Open the `.env` file and set your database credentials.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```


## Database Migrations

Run the following command to create the necessary tables in your database:

```bash
php artisan migrate
```

You can also seed the database with initial data:

```bash
php artisan db:seed
```

## Running the Application

Serve the application using one of the following commands:

```bash
php artisan serve
```

## Routes

The application uses the following routes:

### Genre Routes
- **GET /new-genre**
    - Displays a form to create a new genre.
    - Controller Method: `GenreController@create`
    - Named Route: `genres.create`

- **POST /genres**
    - Submits the new genre data to create a genre.
    - Controller Method: `GenreController@store`
    - Named Route: `genres.store`

### Book Routes
- **GET /new-book**
    - Displays a form to create a new book.
    - Controller Method: `BookController@create`
    - Named Route: `books.create`

- **POST /books**
    - Submits the new book data to create a book.
    - Controller Method: `BookController@store`
    - Named Route: `books.store`

- **GET /books**
    - Lists all books.
    - Controller Method: `BookController@index`
    - Named Route: `books.index`

- **GET /books/{id}**
    - Shows details of a specific book by ID.
    - Controller Method: `BookController@show`
    - Named Route: `books.show`

- **DELETE /books/{id}**
    - Deletes a specific book by ID.
    - Controller Method: `BookController@destroy`
    - Named Route: `books.destroy`

### Rental Routes
- **GET /books/book/{bookId}**
    - Displays a form to create a new rental for a specific book.
    - Controller Method: `RentalController@create`
    - Named Route: `rentals.create`

- **POST /rentals**
    - Submits rental data to create a new rental.
    - Controller Method: `RentalController@store`
    - Named Route: `rentals.store`

- **GET /rentals**
    - Lists all rentals with filtering options (book title, email, genre, date range).
    - Controller Method: `RentalController@index`
    - Named Route: `rentals.index`

- **GET /back**
    - Shows a list of books that are currently rented and not yet returned.
    - Controller Method: `RentalController@active`
    - Named Route: `rentals.active`

- **PATCH /rentals/updateReturnDate**
    - Updates the return dates for currently rented books.
    - Controller Method: `RentalController@updateReturnDate`
    - Named Route: `rentals.updateReturnDate`

### Home Route
- **GET /**
    - Displays the homepage, listing all books.
    - Controller Method: `BookController@index`
    - Named Route: `home`
