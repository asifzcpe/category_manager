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

