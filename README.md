<h3>Notes by the developer Dawoud:
To download and run this app</h3>
<ul>
  <li>You have to have composer and npm installed.</li>
  <li>Run the command "npm i" make npm read the package.json file and download all the needed dependencies in node_modules folder.</li>
  <li>Run the command "composer install" to make composer download all the needed dependencies in vendor folder.</li>
  <li>you haver to run "npm run dev " or "npm run production" in order to compile assests.</li>
  <li>To make backup-larvel work you should edit the dump_binary_path in config/database.php. This path is usually /xampp/mysql/bin/ for xampp.</li>
<li> 
    <ul>To configure the path to where backups are saved:</ul>
      <li>You should configure a disk in config/filesystems.php, give a DISKNAME and assign the path you want to it</li>
      <li>You should assign the DISKNAME to the property disks of the key 'destination' in backup.php.</li>



</li>

  <li>You have to scedule running laravel-backup  with laravel schedular in Base_Path/app/console/kernel.php. Then run the scedular localy or with php cron. Check laravel documentation.</li>

</ul>


<h3> Requirements</h3>
<ul>
  <li>The php version used in development and guaranteed to work is 8.1.2</li>
  <li>The app is built on Laravel Framework 8.77.1 but this doesn't require who wants to install it to do anything.</li>
  <li>The version of all the required packages are included in the composer.json package.json </li>
  


</ul>
<h5>A new command "logs:clear" is defined to delete laravel.log in the /storage/logs directory.The command is defined in routes/console.php</h5>

<h4>Files for laravel-backup </h4>
<pre>
#####   files for laravel-backup
!resources/lang/vendor/backup
\config\backup.php

## they were copied as following:
#                                   Copied File [\vendor\spatie\laravel-backup\config\backup.php] To [\config\backup.php]
#                                   Copied Directory [\vendor\spatie\laravel-backup\resources\lang] To [\resources\lang\vendor\backup]
#
#   by this command:: php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider"

#   After installing the laravel-backup package with    composer require "spatie/laravel-backup:^7.0.0"

</pre>



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
