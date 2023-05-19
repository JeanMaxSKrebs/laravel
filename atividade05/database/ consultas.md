LARAVEL

## Consultas

Consulta para trazer os saloes com reservas no ultimo ano
```php
Salao::whereHas('reservas', function ($query) {
    $query->whereYear('data_vencimento', 2022);
})->get();

```
```php
tinker
Salao::whereHas('reservas', function ($query) { $query->whereYear('data_vencimento', 2022); })->get();
```

Consulta para trazer os saloes com reservas no ultimo mes

```php
Fornecedor::whereHas(
    'estado', //passar pela relacao intermediaria
    fn($q)=>$q->whereHas(
        'regiao',
        fn($q)=>$q->where('nome','Sul')
    ))->get();
```
Consulta para trazer as reservas com pagamento no ultimo ano

```php
Fornecedor::whereHas(
    'estado', //passar pela relacao intermediaria
    fn($q)=>$q->whereHas(
        'regiao',
        fn($q)=>$q->where('nome','Sul')
    ))->get();
```

Consulta para trazer as reservas com pagamento no ultimo mes

```php
Fornecedor::whereHas(
    'estado', //passar pela relacao intermediaria
    fn($q)=>$q->whereHas(
        'regiao',
        fn($q)=>$q->where('nome','Sul')
    ))->get();
```

Consulta para trazer os pagamento que resultaram em festas no ultimo ano

```php
Fornecedor::whereHas(
    'estado', //passar pela relacao intermediaria
    fn($q)=>$q->whereHas(
        'regiao',
        fn($q)=>$q->where('nome','Sul')
    ))->get();
```

Consulta para trazer os pagamento que resultaram em festas no ultimo mes

```php
Fornecedor::whereHas(
    'estado', //passar pela relacao intermediaria
    fn($q)=>$q->whereHas(
        'regiao',
        fn($q)=>$q->where('nome','Sul')
    ))->get();
```
