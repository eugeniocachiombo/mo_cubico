<div wire:ignore class="modal fade" id="add" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-secondary rounded p-4 p-sm-5">

            <div class="modal-header d-flex align-items-center justify-content-between border-0">
                <h3 class="text-primary m-0">Registrar</h3>
                <h3 class="m-0 ps-2">Imóvel</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row">
                        <!-- Título -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" wire:model="title" id="title" class="form-control"
                                placeholder="Título">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descrição -->
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea wire:model="description" id="description" class="form-control" placeholder="Descrição"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Preço -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Preço</label>
                            <input type="text" wire:model="price" id="price" class="form-control"
                                placeholder="Preço" step="0.01">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <script>
                                $("#price").mask('000.000.000.000.000,00', {
                                    reverse: true
                                });
                            </script>
                        </div>

                        <!-- Proprietário -->
                        <div class="col-md-6 mb-3">
                            <label for="owner" class="form-label">Proprietário</label>
                            <select wire:model="owner" id="owner" class="form-select">
                                <option value="">Selecione</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Província -->
                        <div class="col-md-6 mb-3">
                            <label for="province_id" class="form-label">Província</label>
                            <select wire:change='getLocal' wire:model="province_id" id="province_id"
                                class="form-select">
                                <option value="">Selecione</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->description }}</option>
                                @endforeach
                            </select>
                            @error('province_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Município -->
                        <div class="col-md-6 mb-3">
                            <label for="municipality_id" class="form-label">Município</label>
                            <select wire:change='getLocal' wire:model="municipality_id" id="municipality_id"
                                class="form-select">
                                <option value="">Selecione</option>
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}">{{ $municipality->description }}</option>
                                @endforeach
                            </select>
                            @error('municipality_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Endereço -->
                        <div class="col-md-6 mb-3">
                            <label for="address_id" class="form-label">Endereço</label>
                            <select wire:model="address_id" id="address_id" class="form-select">
                                <option value="">Selecione</option>
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->id }}">{{ $address->description }}</option>
                                @endforeach
                            </select>
                            @error('address_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <!-- Botão para abrir o modal de novo endereço -->
                            <button type="button" class="btn btn-link p-0 mt-2" data-bs-toggle="modal"
                                data-bs-target="#addAddressModal">
                                + Cadastrar novo endereço
                            </button>

                            @include('livewire.home-rent.modal.address')
                        </div>


                        <!-- Campo de Foto com wire:loading -->
                        <div class="col-12 mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo" wire:model="photo">

                            <!-- Barra de progresso simples com wire:loading -->
                            <div class="my-2 w-100" wire:loading wire:target="photo">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        role="progressbar" style="width: 100%">
                                        Carregando...
                                    </div>
                                </div>
                            </div>

                            <!-- Pré-visualização -->
                            <center>
                                @if ($photo)
                                    <div class="my-3">
                                        <img src="{{ $photo->temporaryUrl() }}" alt="Pré-visualização da Foto"
                                            class="img-fluid rounded" style="max-height: 100px;"> <br>
                                        <button type="button" class="btn btn-sm btn-danger mt-2"
                                            wire:click="$set('photo', null)">
                                            Remover Foto
                                        </button>
                                    </div>
                                @endif
                            </center>

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Botões -->
                        <div class="col-12 text-end">
                            <button type="button" wire:click.prevent='save' wire:loading.attr="disabled"
                                wire:target="save" class="btn btn-primary px-4 py-2">
                                <span wire:loading.remove wire:target="save">Registrar</span>
                                <span wire:loading wire:target="save">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.on('closemodal', () => {
            document.getElementById('add').classList.remove('show');
            document.getElementById('add').style.display = 'none';
            document.body.classList.remove('modal-open');
            document.querySelector('.modal-backdrop').remove();
        });
    });
</script>
