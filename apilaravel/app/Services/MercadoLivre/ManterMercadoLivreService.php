<?php

namespace App\Services\MercadoLivre;

use App\Model\Produto\Produto;
use App\Services\Utils\CodesApi;
use App\DTO\SincronizarMercadoLivreDTO;
use App\Exceptions\ApiWebControlException;
use App\Model\MercadoLivre\MercadoLivre;
use App\Repository\Contracts\Model\Produto\GradeRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;
use Livepixel\MercadoLivre\Facades\Meli;

/**
 * @author Tiago Franco
 * Servico para processamentos
 * de dados e integracao com o mercado livre
 */
class ManterMercadoLivreService
{
    private $_gradeRepository;
    private $_produtoRepository;
    private $_meLivre;

    public function __construct(
        GradeRepositoryInterface $gradeRepository,
        ProdutoRepositoryInterface $produtoRepository,
        Meli $meLivre
    ) {
        $this->_gradeRepository   = $gradeRepository;
        $this->_produtoRepository = $produtoRepository;
        $this->_meLivre           = $meLivre;
    }

    public function syncronizeMeLivre(SincronizarMercadoLivreDTO $synMeliDTO)
    {

        $produto = $this->_produtoRepository->getProdutoECategoria($synMeliDTO->getIdProduct());
        if (!$produto || empty($produto->classificacao)) {
            throw new ApiWebControlException("Produto não encontrado ou sem categoria (classificação)", CodesApi::OPERACAOINVALIDA);
        }
        #busca as fotos pelo eloquente
        $produto->fotos;

        if ($produto->fotos->count() == 0) {
            throw new ApiWebControlException("Produto {$produto->descricao} precisa ter pelo menos uma imagem", CodesApi::OPERACAOINVALIDA);
        }

        $prodSyncr = $this->_produtoRepository->findOneBy([['id_produto', '=', $produto->id]]);

        if (!isset($produto->id_ml))
            $produto->id_ml = "MLB1953";

        if (isset($prodSyncr->id)) {
            $this->atualizaMeLivre($produto, $prodSyncr, $synMeliDTO);
        } else {
            $this->cadastrarProdutoMeLivre($produto, $synMeliDTO);
        }

        return $produto;
    }

    /*
     * Método atualizaMeLivre vai tratar dos produtos que ja foram sincronizados pelo menos uma vez.
     * A unica alteração que esse método vai realizar dentro das Databases é atualizar a data de alteração
     * da tabela que registra os produtos já sincronizados com base no id.
     */
    private function atualizaMeLivre(Produto $produto, MercadoLivre $prodMercadoLivre, SincronizarMercadoLivreDTO $synMeliDTO)
    {
        $product = [
            "title" => substr($produto->descricao, 0, 50),
            "value" => number_format($produto->custo_medio_venda, 2, '.', ' ')
        ];

        $retorno = $this->_meLivre::put(sprintf("/items/%d", $prodMercadoLivre->id_mercado_livre), $product, ['access_token' => $synMeliDTO->getAccessToken()]);

        if (empty($retorno['body']->id))
            throw new ApiWebControlException($retorno, $retorno['httpCode']);

        $prodMercadoLivre->atualizaUltimaSincronizacao();
    }

    /*
     * Método new vai tratar apenas de produtos que nunca foram sincronizados, 
     * os dados são enviados pelo array $item_a, que está de acordo com os parametros que o MercadoLivre exige.
     * O tratamento para a volta da requisição quando bem sucedida, vai adicionar um novo registro com base
     * no id do produto na tabela de registros de sincronização.
     */
    private function cadastrarProdutoMeLivre(Produto $produto, SincronizarMercadoLivreDTO $synMeliDTO)
    {
        $grade = $this->_gradeRepository->getGradeProduto($produto->id, $produto->cod_barra);
        if (str_replace('.000', '', $grade->qtd_atual) < 0)
            $grade->qtd_atual = 0;

        $pictures = array_map(function ($foto) {
             return ["source" => sprintf("https://webcontrolempresas.com.br/fotos_produtos/%s", $foto['caminho_imagem'])];
        },  $produto->fotos->toArray());

        $attributes = [
            ["id" => "COLOR", "value_name" => empty($produto->cor)      ? "N/A" : $produto->cor],
            ["id" => "MODEL", "value_name" => empty($produto->tamanho)  ? "N/A" : $produto->tamanho],
            ["id" => "SIZE", "value_name"  => empty($produto->tamanho)  ? "N/A" : $produto->tamanho],
            ["id" => "BRAND", "value_name" => empty($produto->id_marca) ? "N/A" : $produto->id_marca]
        ];

        $item = [
            "title"              => substr($produto->descricao, 0, 50),
            "category_id"        => $produto->id_ml,
            "price"              => $grade->valor_varejo_aprazo,
            "currency_id"        => "BRL", // padrão produtos venda no BRASIL
            "available_quantity" => $grade->qtd_atual,
            "buying_mode"        => "buy_it_now",
            "listing_type_id"    => "bronze",
            "condition"          => "new",
            "description"        => ["plain_text" => $produto->descricao_detalhada],
            "pictures"           => $pictures,
            "attributes"         => $attributes
        ];
        
        $retorno = $this->_meLivre::post("/items", $item, ['access_token' => $synMeliDTO->getAccessToken()]);

        if (empty($retorno['body']->id))
            throw new ApiWebControlException(json_encode($retorno), $retorno['httpCode']);

        $this->criarProdutoBanco($retorno['body']->id, $produto->id);

        return response()->json(["status" => true, "message" => $produto->descricao]);
    }

    public function criarProdutoBanco(int $idIntegracaoML, int $idProduto)
    {
        $ml = new MercadoLivre();
        $ml->created_at = date('Y-m-d H:i:s');
        $ml->id_mercado_livre = $idIntegracaoML;
        $ml->id_produto = $idProduto;
        $ml->save();
    }
}
