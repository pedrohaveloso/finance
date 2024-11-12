// @ts-check

import { html } from "./utils.js";

/**
 * @param {string} error
 */
function errorModal(error) {
  const bootstrap = window["bootstrap"];

  const modalHTML = html`
    <div
      class="modal fade"
      id="error-modal"
      tabindex="-1"
      aria-labelledby="error-modal-title"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="error-modal-title">Erro</h5>
          </div>

          <div class="modal-body">${error}</div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-danger"
              data-bs-dismiss="modal"
            >
              Fechar
            </button>
          </div>
        </div>
      </div>
    </div>
  `;

  document.body.insertAdjacentHTML("beforeend", modalHTML);

  const $modal = document.getElementById("error-modal");

  const modal = new bootstrap.Modal($modal);

  modal.show();

  $modal?.addEventListener("hidden.bs.modal", () => {
    modal.remove();
  });
}

if (window["errorMessage"]) {
  errorModal(window["errorMessage"]);
}
