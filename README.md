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
<img width="1459" alt="image" src="https://user-images.githubusercontent.com/22665561/228660870-5b50f9d5-42cc-4827-a840-a6bc485d7c05.png">

#### 6. Click on Category List button and you will see the following results:
<img width="1464" alt="image" src="https://user-images.githubusercontent.com/22665561/228655850-419cd272-7b9e-4272-a070-cc6975f9a9f2.png">

#### 7. Click on Category Tree button and you will see the following results:
<img width="1459" alt="image" src="https://user-images.githubusercontent.com/22665561/228661054-3ef73dd5-d0a9-4ee4-9c20-b11eee523db3.png">

### To run unit tests, execute the following command:
```bash
composer test
```
### OR
```bash
./vendor/bin/phpunit
```

### Folder structure of the application
<img width="301" alt="image" src="https://user-images.githubusercontent.com/22665561/228658090-54ccdfc7-b25c-4b57-952a-5641fdf107ee.png">

<details>
 <summary>config</summary>
 <p>It containes bootstrap.php file to load the application </p>
</details>
<details>
 <summary>public</summary>
 <p>This folder contains assets folder for example css and also contain index.php file that is the main gateway to access the application</p>
</details>
<details>
 <summary>src</summary>
 <p>This folder contains all the necessary files and folders related to the project logic</p>
  <details>
  <summary>Controllers</summary>
  <p>It contains controller files like other frameworks</p>
</details>
 <details>
  <summary>Core</summary>
  <p>This folder contains all the necessary logics to structure the project as MVC</p>
</details>
 <details>
  <summary>Models</summary>
  <p>Contains files to execite database queries using PDO</p>
</details>
 <details>
  <summary>Services</summary>
  <p>Business logic for genrating tree like structure of categories</p>
</details>
 <details>
  <summary>Views</summary>
  <p>It mainly contains html code to create contents</p>
</details>
</details>
<details>
  <summary>test</summary>
  <p>Test cases have been written here</p>
</details>
