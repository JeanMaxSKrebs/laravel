LARAVEL

## Consultas

Consulta para trazer os saloes com reservas nesse ano

    ```php
    Salao::whereHas('reservas', function ($query) {
        $query->whereYear('data_hora', 2023);
    })->get();

    ```

    ```php
    tinker
    Salao::whereHas('reservas', function ($query) { $query->whereYear('data_hora', 2023); })->get();
    ```

Consulta para trazer uma contagem de quantos saloes tem reservas nesse ano

    ```php
    Salao::whereHas('reservas', function ($query) {
        $query->whereYear('data_hora', 2023);
    })->get()->count();;
    ```

    ```php
    tinker
    Salao::whereHas('reservas', function ($query) { $query->whereYear('data_hora', 2023); })->get()->count();
    ```

Consulta para trazer os saloes com reservas no ultimo mes

    ```php
    Salao::whereHas('reservas', function ($query) {
    $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m'));
    })->get();
    ```

    ```php
    tinker
    Salao::whereHas('reservas', function ($query) { $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m')); })->get();
    ```

Consulta para trazer uma contagem dos saloes com reservas no ultimo mes

    ```php
    Salao::whereHas('reservas', function ($query) {
    $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m'));
    })->get()->count();
    ```

    ```php
    tinker
    Salao::whereHas('reservas', function ($query) { $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m')); })->get()->count();;
    ```
Consulta para trazer os clientes com reservas no ultimo mes

    ```php
    Cliente::whereHas('reservas', function ($query) {
    $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m'));
    })->get();
    ```

    ```php
    tinker
    Cliente::whereHas('reservas', function ($query) { $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m')); })->get();
    ```

Consulta para trazer uma contagem dos clientes com reservas no ultimo mes

    ```php
    Cliente::whereHas('reservas', function ($query) {
    $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m'));
    })->get()->count();
    ```

    ```php
    tinker
    Cliente::whereHas('reservas', function ($query) { $query->where(DB::raw('MONTH(data_hora)'), now()->subMonth()->format('m')); })->get()->count();;
    ```

Consulta para trazer as reservas com pagamento no ultimo ano

    ```php
    Pagamento::whereHas('reserva', function ($query) 
    { $query->whereYear('data_pagamento', 2023);
    })->get();

    ```
    ```php
    tinker
    Pagamento::whereHas('reserva', function ($query) { $query->whereYear('data_pagamento', 2023); })->get();
    ```

Consulta para uma contagem das reservas com pagamento no ultimo ano

    ```php
    Pagamento::whereHas('reserva', function ($query) 
    { $query->whereYear('data_pagamento', 2023);
    })->get()->count();

    ```
    ```php
    tinker
    Pagamento::whereHas('reserva', function ($query) { $query->whereYear('data_pagamento', 2023); })->get()->count();
    ```


    Para obter o total de pagamentos atrasados

    ```php
    Pagamento::whereHas('reserva', function ($query) {
        $query->whereYear('data_pagamento', 2023);
    })->whereColumn('data_pagamento', '>', 'data_vencimento')
    ->count();   
    ```

    ```php
    PAGAMENTO::table('clientes as c')->join('reservas as r', 'c.id', '=', 'r.cliente_id')->join('pagamentos as p', 'r.id', '=', 'p.reserva_id')->count();
    ```

    ```sql
    SELECT COUNT(*) AS total_pagamentos_atrasados
    FROM clientes c
    INNER JOIN reservas r ON c.id = r.cliente_id
    INNER JOIN pagamentos p ON r.id = p.reserva_id
    WHERE p.data_pagamento > p.data_vencimento
    ```


Consulta para obter uma contagem do total de clientes distintos que realizaram pagamentos atrasados

    ```php
    Pagamento::whereHas('reserva', function ($query) {
        $query->whereColumn('data_pagamento', '>', 'data_vencimento');
    })->join('reservas', 'pagamentos.reserva_id', '=', 'reservas.id')
    ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
    ->distinct('clientes.id')
    ->count('clientes.id');
    ```

    ```php
    Pagamento::whereHas('reserva', function ($query) { $query->whereColumn('data_pagamento', '>', 'data_vencimento'); })->join('reservas', 'pagamentos.reserva_id', '=', 'reservas.id') ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id') ->distinct('clientes.id') ->count('clientes.id');
    ```

    ```sql
        SELECT COUNT(DISTINCT c.id) AS total_clientes_atrasados FROM clientes c INNER JOIN reservas r ON c.id = r.cliente_id INNER JOIN pagamentos p ON r.id = p.reserva_id WHERE p.data_pagamento > p.data_vencimento 
    ```

Consulta para trazer as reservas com pagamento no ultimo mes

::TODO

Consulta para trazer os pagamento que resultaram em festas no ultimo ano

::TODO

Consulta para trazer os pagamento que resultaram em festas no ultimo mes

::TODO
