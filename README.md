# Category Manager
## Create a hierarchical category tree that displays the total item count for each category and arrange the categories in descending order based on the number of items they contain. Additionally, in the case of a category with child categories, the total number of items for all child categories should be considered in the parent category's total item count.
### Setup process
#### 1. Go to your command line and run the following command
```bash
composer install
```
#### 2. After the completion of dependency installation, do the following things:
1. create a file named .env in the project root folder
2. Copy content from .env.example file and paste them to newly generated .env file like the following

```bash
DB_HOST="YOUR_DATABASE_SERVER"
DB_NAME="YOUR_DATABASE_NAME"
DB_USERNAME="YOUR_USERNAME"
DB_PASSWORD="YOUR_PASSWORD"
```

#### 3. Then, create a database with the same name you have inserted in .env file for DB_NAME value.

#### 4. Run the following command to insert all required data into database with the following command

```bash
composer import
```
This command automatically insert all data into database running sql from `ecommerce.sql` file under the project directory

Note: If you already have the necessary data inserted into the DB, you don't need to run this command.

#### 4. Now, run the following command via your command line
```bash
composer start
```
This will start the server Or, you can use the following command too
```bash
php -S localhost:8000 -t public/
```

#### 5. Now, the application server has been started. write `localhost:8000` in your browser's address bar and you can see a home page like the following:
<img width="1464" alt="image" src="https://user-images.githubusercontent.com/22665561/228655583-eb3669fc-ff26-4fd8-b200-68049f352d17.png">

#### 6. Click on Category List button and you will see the following results:
<img width="1464" alt="image" src="https://user-images.githubusercontent.com/22665561/228655850-419cd272-7b9e-4272-a070-cc6975f9a9f2.png">

#### 7. Click on Category Tree button and you will see the following results:
<img width="1464" alt="image" src="https://user-images.githubusercontent.com/22665561/228656069-1bbc2113-6003-4b8c-9672-40d7807f42b8.png">

### To run unit tests, execute the following command:
```bash
composer test
```
