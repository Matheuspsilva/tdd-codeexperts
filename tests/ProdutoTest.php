<?php
namespace Code;


use PHPUnit\Framework\TestCase;

Class ProdutoTest extends TestCase{

    private $produto;

    public function setUp():void{
        $this->produto = new Produto();
    }

    // public function setUpBeforeClass(): void
    // {
        
    // }

    // public function tearDownAfterClass(): void
    // {
        
    // }

    public function testSeONomeDoProdutoESetadoCorretamente(){
        $produto = $this->produto;
        $produto->setName('Produto 1');

        $nomeEsperado = 'Produto 1';
        $nomeRetornado = $produto->getName();

        $this->assertEquals($nomeEsperado, $nomeRetornado, " O valor esperado do nome é $nomeEsperado, mas o valor retornado foi $nomeRetornado");
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente(){
        $produto = $this->produto;
        $produto->setPrice('19.99');

        $precoEsperado = '19.99';
        $precoRetornado = $produto->getPrice();

        $this->assertEquals($precoEsperado, $precoRetornado, " O valor esperado do preco é $precoEsperado, mas o valor retornado foi $precoRetornado");
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
    $produto = $this->produto;
    $produto->setSlug('slug');

    $slugEsperado = 'slug';
    $slugRetornado = $produto->getSlug();

    $this->assertEquals($slugEsperado, $slugRetornado, " O valor esperado do slug é $slugEsperado, mas o valor retornado foi $slugRetornado");
    }

    /*
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro inválido, informe um slug válido
     */
    public function testSeSlugLancaExeption(){

        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Parâmetro inválido, informe um slug válido');

        $product = $this->produto;
        $product->setSlug('');

    }
}