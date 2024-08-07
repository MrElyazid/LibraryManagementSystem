
# Ohara Library

A website where clients can reserve books before picking them up physically from a real library, made with Laravel.

## Features

The website is available from two perspectives: client and librarian.

### Client Features

- Loan books
- Manage wishlisted books
- Access profile
- Search and view book authors and categories

### Librarian Features

- Export list of loans in PDF or CSV format
- Declare a loan ended by setting the date the book was returned
- Message clients via email (see SMTP configuration)
- Change due dates for loans
- Access list of clients and their loans
- Edit book information
- Remove books
- Add books to the database
- Access statistics dashboard and view visual charts

## ER Diagram

![ER Diagram](readmeassets/MLD_LMS.excalidraw.png)

## How to Run

1. **Clone the Repository**:
   ```bash
   git clone [https://github.com/MrElyazid/LibraryManagementSystem.git]
   cd [LibraryManagementSystem]
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Configure the `.env` File** with database credentials:
   ```bash
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

4. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Optional: Setup SMTP Server**:
   To enable email functionality, add the following to the `.env` file:
   ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=YOUR_EMAIL
   MAIL_PASSWORD=GOOGLE_APP_PASSWORD
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=YOUR_EMAIL
   MAIL_FROM_NAME="Ohara Library"
   ```

6. **Serve the Application**:
   make sure the  database is up and running, then start the server:
   ```bash
   php artisan serve
   ```
   The app should be accessible at `http://localhost:8000`.

7. **Optional: Use Sample Data**:
   - Run the following to create the schema:
     ```bash
     php artisan migrate
     ```
   - Import data with:
     ```bash
     php artisan db:import --ignore-auto-increment
     ```
   - Download the images folder from [https://drive.google.com/file/d/1wXHFYNlLC8emqIPJsGTnUvOa9Pi4A8dW/view?usp=sharing], decompress it, and place it at `storage/app/public`.


## Website Screenshots

### Homepage
![Homepage](https://drive.google.com/uc?export=view&id=1tCjL9i9uKAB0vsRuAxnD1SURDsiUFssB)

### Books page
![Books](https://drive.google.com/uc?export=view&id=1mVZOEzwue3FKCmHF78b5x6i8QmfoLH94)

### Backpack
![Backpack](https://drive.google.com/uc?export=view&id=1R4GAjLh70bGVLd6-Qj4AjtZblobth-US)

### Wishlist
![Wishlist](https://drive.google.com/uc?export=view&id=1NGXO6zf2wnhW6OC7VpunK1jhgxclCTxw)

### Categories
![Categories](https://drive.google.com/uc?export=view&id=1lC0S4ghUjYvFUJKp5_dtkqcGIhLckQtw)

### Authors
![Authors](https://drive.google.com/uc?export=view&id=1BjLj5NovLnXApM2awZ2fdbgS6P-J1G_e)

### Book page
![Book](https://drive.google.com/uc?export=view&id=1HaFSMW4HyYgHEub9t3oQHspQ41TYU26t)

### Loan form
![Loan Form](https://drive.google.com/uc?export=view&id=1Fpz4-umXIC38pDp2FtKXyG6ZRduA0i-8)

### Clients
![Clients](https://drive.google.com/uc?export=view&id=14pfUKOq0mFK9yfUmckxwSd7W1jz782XO)

### Dashboard
![Dashboard](https://drive.google.com/uc?export=view&id=1tBVyKfA0nehcDJf5PN3SEUuj4Ruq8Cib)
