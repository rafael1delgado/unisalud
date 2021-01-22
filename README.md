## Fhir based Patient manager, no database required.

Installation:

- ```git clone https://github.com/cl-ssi/unisalud```
- ```cd unisalud```
- ```composer install```
- ```cp .env-example .env```
- ```php artisan key:generate```
- edit file .env and set FHIR_URL_BASE variable with server fhir base path.
- ```php artisan serve```
- navigate to http://localhost:8000/patient

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Dependencies
Build on laravel 8.24 + bootstrap + livewire

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
