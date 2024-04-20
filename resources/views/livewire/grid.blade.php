

<div class="flex-center position-ref ">
    <div class="container pt-3">
        {{-- Verifica se existe alguma mensagem para retornar para o usuário. --}}
        @if (session()->has('mensagem'))
            <div class="alert alert-{{session('type')}}" role="alert">{{ session('mensagem') }}</div>
        @endif
        <div class="card ">
            <div class="row m-2">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" wire:click="search" class="input-group-text" id="btn">🔎</button>
                        </div>
                        <select wire:model="state" id=""  class="form-control" aria-describedby="basic-addon1"> 
                            @foreach ( $states as $state )
                            <option value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div wire:loading.block>
                <div  class="row d-flex justify-content-center m-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>Código IBGE</th>
                        <th>Município</th>
                    </tr>
                    
                </thead>
                <tbody id="tbody">
                    @if($cities)
                        @foreach ( $cities as $city )
                            <tr>
                                <th>{{$city->id}}</th>
                                <th class="esq">{{$city->nome}}</th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>     
    </div>
</div>
