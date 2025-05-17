<div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content {{ auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }}  rounded p-4 p-sm-5">

            <div class="modal-header d-flex align-items-center justify-content-between border-0">
                <h3 class="text-primary m-0">Registrar</h3>
                <h3 class="m-0 ps-2 {{ auth()->user()->getDarkMode ? '' : 'text-dark' }} ">Imóvel</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                type="text" wire:model="title" id="title" class="form-control"
                                placeholder="Título">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                wire:model="description" id="description" class="form-control" placeholder="Descrição"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Preço</label>
                            <input
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                type="text" wire:model="price" id="price" class="form-control"
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


                        <div class="col-md-6 mb-3">
                            <label for="owner" class="form-label">Proprietário</label>
                            <select
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background-color: transparent;' }}"
                                wire:model="owner" id="owner" class="form-select">
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


                        <div class="col-md-6 mb-3">
                            <label for="province_id" class="form-label">Província</label>
                            <select
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background-color: transparent;' }}"
                                wire:change='getLocal' wire:model="province_id" id="province_id" class="form-select">
                                <option value="">Selecione</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->description }}</option>
                                @endforeach
                            </select>
                            @error('province_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="municipality_id" class="form-label">Município</label>
                            <select {{ $province_id ? '' : 'disable' }}
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background-color: transparent;' }}"
                                wire:change='getLocal' wire:model="municipality_id" id="municipality_id"
                                class="form-select {{ $province_id ? '' : 'bg-secondary' }}">
                                <option value="">Selecione</option>
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}">{{ $municipality->description }}</option>
                                @endforeach
                            </select>
                            @error('municipality_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3 position-relative">
                            <label for="addressDesc" class="form-label">Morada</label>

                            <input {{ $municipality_id ? '' : 'disabled' }} type="text" list="address_suggestions"
                                wire:model.live="addressDesc" id="addressDesc"
                                class="form-control {{ $municipality_id ? '' : 'bg-secondary' }}"
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background-color: transparent;' }}"
                                placeholder="Digite o bairro ou endereço" />


                            <datalist id="address_suggestions">
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->description }}">{{ $address->description }}</option>
                                @endforeach
                            </datalist>

                            @error('addressDesc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if ($addressDesc && !in_array($addressDesc, collect($addresses)->pluck('description')->toArray()))
                                <button type="button" class="btn btn-link position-absolute top-0 end-0 mt-4 me-2"
                                    wire:click='createAddress' title="Adicionar novo endereço">
                                    <i class="bi bi-plus-circle-fill text-primary fs-5"></i>
                                </button>
                            @endif
                        </div>



                        <!-- Campo de Foto com wire:loading -->
                        <div class="col-12 mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input
                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                type="file" class="form-control" id="photo" wire:model="photo">

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
                            <button type="button" wire:click.prevent="submit"
                                wire:target="submit"
                                class="btn btn-primary px-4 py-2">
                                <span wire:loading.remove
                                    wire:target="submit">Registrar</span>
                                <span wire:loading wire:target="submit">
                                    <i class="fa fa-spinner fa-spin"></i> Registrar
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
