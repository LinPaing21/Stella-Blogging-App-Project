# Stella Blogging App Project Using Laravel

## Demo Link
https://stella-blogging-app.vercel.app/

**Discliamer:** Image uploading is disabled in demo because of vercel restrictions. It will be open soon after upgrading to cloud storage.

## Installation

First clone or download this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/LinPaing21/Stella-Blogging-App-Project.git
cd Stella-Blogging-App-Project
composer install
cp .env.example .env
php artisan key:generate
```

In .env, config mail section with your mail account.

To work password reset function, you need to use actual email when you register.

Then create the necessary database and connect in .env file.

Example:
 ``` DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={YourDatabaseName}
DB_USERNAME=root
DB_PASSWORD={If you have password, enter your password}  
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

In DatabaseSeeder.php, you can see who are admin(1 to 3), author(4 to 8) and user(rest all). Password of all accounts "*password*".

## Some More Ideas

Although I have a lot of ideas, some features are advanced and out of my knowledge. Some features are not big deal like user profile section, Report feature, bookmarks feature but I want to learn new things and want to make it better. So I didn't implement all. 

If you have more ideas or some questions, feel free to contact me and contribute my project.

## Appreciation

Laravel - Thanks for helping me a lot easier to learn and creating project.

Laracasts - Thanks for giving me free learning resoures and community.

Teachers - Thanks all teachers on online for sharing knowledges and experiences.
