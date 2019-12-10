<?php
namespace Code;

use PHPUnit\Framework\TestCase;

Class CartTest extends TestCase{
    //Manipular Vários Produtos
    //Visualizar Produtos
    //Total de Produtos/Compra

    private $carrinho;
    private $produto;

    public function setUp():void
    {
        $this->carrinho = new Cart();
        $this->produto = new Produto();
    }
    
    public function tearDown(): void
    {
        unset($this->carrinho);
        unset($this->produto);

    }

    // public function testSeClasseCarrinhoExiste(){
    //     $classe = class_exists('\\Code\\Cart');
    //     $this->assertTrue($classe);
    // }

    protected function assertPreConditions():void
    {
        $classe = class_exists('\\Code\\Cart');
        $this->assertTrue($classe);
    }

    // protected function assertPostConditions(): void
    // {
        
    // }

    public function testAdicaoDeProdutosNoCarrinho(){

        $produto1 = $this->produto;
        $produto1->setName('Produto 1');
        $produto1->setPrice(19.99);
        $produto1->setSlug('produto-1');

        $produto2 = $this->produto;
        $produto2->setName('Produto 2');
        $produto2->setPrice(19.99);
        $produto2->setSlug('produto-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto',$carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto',$carrinho->getProdutos()[1]);
    }

public function testSeValoresDeProdutosNoCarrinhoEstaoCorretos(){
    // $produto1 = new Produto();
    // $produto1->setName('Produto 1');
    // $produto1->setPrice(19.99);
    // $produto1->setSlug('produto-1');

    $produtoStub = $this->getStubProduto();


    $carrinho = $this->carrinho;
    $carrinho->addProduto($produtoStub);

    $this->assertEquals('Produto 1', $carrinho->getProdutos()[0]->getName());
    $this->assertEquals(19.99, $carrinho->getProdutos()[0]->getPrice());
    $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
}

public function testSeTotalDeProdutosEValorDaCompraEstaoCorretos(){

    $produto1 = $this->produto;
    $produto1->setName('Produto 1');
    $produto1->setPrice(19.99);
    $produto1->setSlug('produto-1');

    $produto2 = $this->produto;
    $produto2->setName('Produto 2');
    $produto2->setPrice(19.99);
    $produto2->setSlug('produto-2');

    $carrinho = $this->carrinho;
    $carrinho->addProduto($produto1);
    $carrinho->addProduto($produto2);

    $this->assertEquals(2, $carrinho->getTotalProdutos());
    $this->assertEquals(39.98, $carrinho->getTotalCompra());

}

public function testImcompleto(){
    $this->assertTrue(true);
    $this->markTestIncomplete();
}

//ANNOTATION


/**
 * @requires PHP == 5.3
 */
public function testVersaoMaior53(){

    $this->assertTrue(true);
    // $this->markTestSkipped();
}

public function testSeLogESalvoQuandoInformadoParaAdicaoDoProduto()
{
    $carrinho = new Cart();
    $logMock = $this->getMockBuilder(Log::class)
                ->setMethods(['log'])
                ->getMock();

    $logMock->expects($this->once())
                ->method('log')->with($this
                ->equalTo('Adicionando produto no carrinho'));

    $carrinho->addProduto($this->getStubProduto(), $logMock);
}

public function getStubProduto(){
    $produtoStub = $this->createMock(Produto::class);
    $produtoStub->method('getName')->willReturn('Produto 1');
    $produtoStub->method('getPrice')->willReturn(19.99);
    $produtoStub->method('getSlug')->willReturn('produto-1');

    return $produtoStub;
}


}