# About

Over the last several years, I've been committed to figuring myself out as a retired man in his 30's. Stoic philosophy
has
been a great help in that journey.

This project is intended to accomplish a few things:

* Deepen my connection with and understanding of the source material by narrating passages from classic texts (you can
  find them at https://stoic.gringo.dev)
* Help others by connecting them with philosophical traditions I wish I'd had exposure to at an earlier point in my life
* Demonstrate how to work with technologies I like and/or want to experiment with (Laravel, Livewire, Volt, Folio, etc.)
* Provide a starting point for your own podcast platform by building in public and open sourcing the code

Feedback and pull requests are very welcome!

# Follow Along

You can find a living version of this project at: https://stoic.gringo.dev

You can follow along as I build it on my YouTube channel: https://youtube.com/@GringoDotDev

# Setup

You can set up this project like pretty much any normal Laravel project:

```text
# you may/will need to adjust some env variables
cp .env.example .env
npm i
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan octane:start --watch
npm run dev
```

You should be able to see the home page and log in to /admin with credentials `admin@gringo.dev` / `password`.

# Implementation Notes

This project works pretty similarly to any other Laravel project, but a few details to point out:

* Via Laravel Folio, find file-based pages at: `/resources/views/pages`
* Via Laravel Volt, find Livewire components at : `/resources/views/livewire`
* You can reach the FilamentPHP admin panel in your browser at `/admin`
* It uses Laravel Octane (with Roadrunner) for extra performance
* It runs on MySQL in production but _should_ work with any Eloquent-compatible database

# Self-Hosting

In production this project is hosted using a small Hetzner server orchestrated by ploi.io, but should be easily
self-hostable in other environments as well.
