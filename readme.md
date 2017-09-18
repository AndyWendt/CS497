# CS 497

## Resources

* [Larachat Slack Team](https://larachat.co/)
* [Idaho PHP User Group](https://www.meetup.com/Idaho-PHP/)
* [Laravel Docs](https://laravel.com/docs/5.5)
* [What's New in Laravel 5.5 on Laracasts](https://laracasts.com/series/whats-new-in-laravel-5-5)
* [How to Build Your Own Framework](https://symfony.com/doc/current/create_framework/index.html)
* [Presentation](https://docs.google.com/presentation/d/1pnP36Ru3PfDmmmp-mKilk0MpngNE_Rpa5jcYsiaYcYw/edit#slide=id.g25f2042fd7_0_239)

## Project Layout and Description


### Routes and Views

#### Routes

In `routes/`, you will find `web.php` where the web routes for the app are defined. Therein we have the following routes:

* `/` is the default route and is the default route for Laravel

* `/posts?tag={tag-name}` which returns all of the posts in the system. 
    * This particular route, allows you to pass a [query parameter](https://en.wikipedia.org/wiki/Query_string) in the url, 
        `tag={tag-name}`, and it filters the posts using the tag name. 

* `/postsWithTags` returns all the posts and tags as an html page
 


#### Views

* `resources/views/posts.blade.php` is the view that displays all of the posts and their tags.
                
          
### Controllers 

* `app/Http/Controllers/PostsController.php`
    * The `index` method returns all of the posts that can be filtered by a `tag` query parameter.  This method does not 
    return a view, it returns the results from the model. 
    
    * The `postsWithTags` method returns a view with all of the posts and tags rendered using a [Blade](https://laravel.com/docs/5.5/blade) 
    template. 


### Model Layer
     
* `app/Tag.php` The Tag model
* `app/Post.php` The Post model. Notice the `tags()` [relationship method](https://laravel.com/docs/5.5/eloquent-relationships). 
* `app/PostService.php` The PostService is used to filter posts by tag and also abstract the postsWithTags query. 
    * I would NOT filter the Posts like the example given in `filterPostsByTag()` in most circumstances since it will be 
    more performant to filter using the database. The example in `filterPostsByTag()` is given mainly to show how to use 
    Laravel Collections. 
    * Notice the [Eager Loading](https://laravel.com/docs/5.5/eloquent-relationships#eager-loading) usage in `postsWithTags()`
    
### Service Container

* A binding was added in `app/Providers/AppServiceProvider.php`
* An interface was added that resides at `app/Contracts/PostServiceInterface.php`
    


## Installation & Dev Environment Setup

I highly recommend using a Mac or Linux system for PHP Development.  Using a Windows system is akin to having your fingernails pulled. 

* [Installation Docs](https://laravel.com/docs/5.5/installation)
* [Homestead: Dev Environment](https://laravel.com/docs/5.5/configuration)
* [Laravel From Scratch on Laracasts](https://laracasts.com/series/laravel-from-scratch-2017)


## Artisan Commands

Below are most of the commands that were used to generate the files on the `example` branch. 

See the [docs](https://laravel.com/docs/5.5/artisan) for more information. 

### Create Controllers

```bash
# Make the posts controller
php artisan make:controller PostsController
```


### Create Models

```bash
# Make Models
php artisan make:model Post
php artisan make:model Tag
```

### Migrations


Create the migrations

```bash
# Make Migrations
php artisan make:migration create_posts_table
php artisan make:migration create_tags_table
php artisan make:migration create_post_tag_table
```

Run the migrations: 

```bash
php artisan migrate
```


### Seeders

Create the seeders

```bash
php artisan make:seeder TagsTableSeeder
php artisan make:seeder PostsTableSeeder
```

Seed the database: 

```bash
php artisan db:seed
```

Refresh and migrate the database and then seed
```bash
php artisan migrate:refresh --seed
```
