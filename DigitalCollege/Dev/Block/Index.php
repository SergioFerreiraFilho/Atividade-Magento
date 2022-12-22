<?php
namespace DigitalCollege\Dev\Block;
use DigitalCollege\Dev\Model\DigitalFactory;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $DigitalCollegeFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    DigitalFactory $DigitalCollegeFactory, array $data = []) {
        $this->DigitalCollegeFactory = $DigitalCollegeFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        return parent::__construct($context);
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }

    public function getDados(){
        $dados = $this->DigitalCollegeFactory->create()->getCollection();
        return $dados->getData();
    }

    public function saveData(){
        $dados = $this->DigitalCollegeFactory->create();
        $dados->setData([
            'author_name'=>'DigitalCollege',
            'email'=>'DigitalCollege@email.com',
            'description'=>'agora vai',
        ]
    );
    $dados->save();
    }
}
