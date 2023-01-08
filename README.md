

## Package Laravel9 Insatll

- [laravel/ui]
- [laravelcollective/html]
- [mcamara/laravel-localization]
- [spatie/laravel-medialibrary]
- [spatie/laravel-permission]
- [spatie/laravel-translatable]


## Ready Model And Controller Laravel
- [User/RequestUser]
- [Role/RequestUser]

## Ready Blade Laravel
- [User]
- [Role]

## Seo 
```php
    <!-- Master -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    // OR with multi
    {!! JsonLdMulti::generate() !!}

    <!-- OR -->
    {!! SEO::generate() !!}

    <!-- MINIFIED -->
    {!! SEO::generate(true) !!}

    <!-- LUMEN -->
    {!! app('seotools')->generate() !!}
