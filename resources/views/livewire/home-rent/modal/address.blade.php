  <!-- Modal de novo endereço -->
  <div wire:ignore class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content bg-secondary rounded ">
              <form>
                  <div class="modal-header">
                      <h5 class="modal-title" id="addAddressModalLabel">Novo Endereço</h5>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="addressDesc" class="form-label">Descrição</label>
                          <input type="text" wire:model="addressDesc" id="addressDesc" class="form-control">
                          @error('addressDesc')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" onclick="closemodalAddress()" class="btn btn-dark">Cancelar</button>
                      <button type="button" wire:click.prevent='createAddress' wire:loading.attr="disabled"
                          wire:target="createAddress" class="btn btn-primary px-4 py-2">
                          <span wire:loading.remove wire:target="createAddress">Registrar</span>
                          <span wire:loading wire:target="createAddress">
                              <i class="fa fa-spinner fa-spin"></i> 
                          </span>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <script>
     document.addEventListener("DOMContentLoaded", () => {
          Livewire.on('closemodalAddresses', () => {
            closemodalAddress();
          });
      });

      function closemodalAddress() {
          document.getElementById('addAddressModal').classList.remove('show');
          document.getElementById('addAddressModal').style.display = 'none';
          document.body.classList.remove('modal-open');
          document.querySelector('.modal-backdrop').remove();
      }

     
  </script>
