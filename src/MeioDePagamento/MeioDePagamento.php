<?php

namespace Nelson\Comex\MeioDePagamento;

// Implementação de uma Interface para Meio de Pagamento
interface MeioDePagamento {
    public function processarPagamento(float $valor);
}

?>