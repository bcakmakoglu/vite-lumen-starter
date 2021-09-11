# Vite-Lumen Starter Template

Add vite anywhere on your templates or app by using the `Vite` helper class.

For example add it into your bootstrap file like this:

```php
// Register main.ts file 
$vite = $app->make(\App\Providers\Vite\Vite::class);
echo $vite('main.ts');
```

## Vite

To properly get the app to work you should check the Vite.php file and modify it to your needs.

# Lumen

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We
believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain
out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction,
queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in
the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All
security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
