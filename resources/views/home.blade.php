@extends('layouts.app')

@section('content')
<div class="container">
    {{-- DASHBOARD --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Olá, {{$name}}</h1>
                    <span>{{ ("Você está logado.") }}</span>
                   
                    <span>Você pode:</span>
                    <ul>
                        @if ($tier === 1)
                            <li><del>Registrar novos usuários</del> (EM DESENVOLVIMENTO);</li>
                            <li>Ver todos pedidos.</li>
                        @endif
                        <li>Registrar novos pedidos;</li>
                        <li>Ver seus pedidos;</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- REGISTER --}}
    @if ($tier === 1)
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register EM DESENVOLVIMENTO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Repetir senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                       <div class="row mb-3">
                            <label for="tier" class="col-md-4 col-form-label text-md-end">{{ __('Nível') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Tier select" name="tier" id="tier">
                                    <option selected value="default">Selecione o nível do usuário</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Padrão</option>
                                </select>
                                @error('tier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif      
    
    {{-- CRIAR PEDIDO --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fazer pedido') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerOrder') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="orderTitle" class="col-md-4 col-form-label text-md-end">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="orderTitle" type="text" class="form-control @error('orderTitle') is-invalid @enderror" name="orderTitle" value="{{ old('orderTitle') }}" required autocomplete="orderTitle" autofocus>

                                @error('orderTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="row mb-3">
                            <label for="orderCategory" class="col-md-4 col-form-label text-md-end">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="orderCategory select" name="orderCategory" id="orderCategory">
                                    <option selected value="default">Selecione uma categoria</option>
                                    <option value="eletronic">Eletrônicos</option>
                                    <option value="furnitures">Móveis</option>
                                    <option value="consumables">Consumíveis</option>
                                    <option value="anothers">Outros</option>
                                </select>
                                @error('orderCategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>

                       <div class="row mb-3">
                            <label for="orderDescription" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="orderDescription" name="orderDescription" rows="3"></textarea>
                                @error('orderDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Fazer pedido') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    {{-- SEUS PEDIDOS --}}     
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seus pedidos') }}</div>

                <div class="card-body">
                    <div class="orders-list">
                        <div class="accordion accordion-flush" id="accordion-orders">
                        @foreach ($orders as $order)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse{{$order->id}}">
                                        {{$order->title}} ID: {{$order->id}}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$order->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-orders">
                                    <div class="accordion-body">
                                        <p>ID: {{$order->id}}</p>
                                        <p>Título: {{$order->title}}</p>
                                        <p>Descrição: {{$order->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                     </div>
                </div>
            </div>
        </div>
    </div>    

</div>

{{-- TODOS PEDIDOS --}}
<div class="mb-3">
    @if (isset($allOrders))
<div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Todos pedidos') }}</div>

            <div class="card-body">
                <div class="orders-list">
                    <div class="accordion accordion-flush" id="accordion-allOrders">
                    @foreach ($allOrders as $order)
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseAll{{$order->id}}" aria-expanded="false" aria-controls="flush-collapseAll{{$order->id}}">
                                {{$order->title}} ID: {{$order->id}}
                            </button>
                        </h2>
                        <div id="flush-collapseAll{{$order->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-allOrders">
                            <div class="accordion-body">
                                <p>ID: {{$order->id}}</p>
                                <p>Título: {{$order->title}}</p>
                                <p>Descrição: {{$order->description}}</p>
                            </div>
                        </div>
                        </div>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>  
@endif  
</div> 

{{-- TODOS USUÁRIOS --}}
<div>
    @if (isset($allUsers))
<div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Todos usuários') }}</div>

            <div class="card-body">
                <div class="orders-list">
                    <div class="accordion accordion-flush" id="accordion-allOrders">
                    @foreach ($allUsers as $userIndex)
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-user{{$userIndex->id}}" aria-expanded="false" aria-controls="flush-user{{$userIndex->id}}">
                                {{$userIndex->name}} ID: {{$userIndex->id}}
                            </button>
                        </h2>
                        <div id="flush-user{{$userIndex->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-allOrders">
                            <div class="accordion-body">
                                <p>ID: {{$userIndex->id}}</p>
                                <p>Título: {{$userIndex->name}}</p>
                                {{-- <p>Descrição: {{$userIndex->description}}</p> --}}
                            </div>
                        </div>
                        </div>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>  
@endif   
</div>

@endsection
