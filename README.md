There is factory named folderin database in which their ia a file names usersfactory in we can make our own factory by usingn this below command

```
php artisan make:factory ListingFactory
```

```
php artisan migrate:refresh --seed
```

## now we will make the layout

layout.blade.php

"alpine.js"

```
abort(404);
```

Route model binding

```

    <x-listing-card :listing="$Listing" />
```

```
 {{$slot}}
```

```
composer require itsgoingd/clockwork
```

after form opening tag use
`@csrf`
It prevents cross sites scripting attacks

### now we will be validating forms

```

 $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email'  => ['required', 'email'],
            'tags' => 'required',
            'description'=> 'required'
        ]);

        return redirect('/');

```

make fillable in modal to allow mass assignment

```
protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];
```

`Model::unguard();`
