<?php

class PurchaseModel {
    private $purchaseDTO;

    public function __construct(PurchaseDTO $purchaseDTO) {
        $this->purchaseDTO = $purchaseDTO;
    }

    public function getAllPurchases() {
        return $this->purchaseDTO->getAllPurchases();
    }

    public function getTotalRevenue() {
        return $this->purchaseDTO->getTotalRevenue();
    }

    public function getActiveCustomers() {
        return $this->purchaseDTO->getActiveCustomers();
    }

    public function createPurchase($id_user, $id_book, $price, $status = 'completed') {
        return $this->purchaseDTO->createPurchase($id_user, $id_book, $price, $status);
    }

    public function updatePurchase($id, $id_user, $id_book, $price, $status = 'completed') {
        return $this->purchaseDTO->updatePurchase($id, $id_user, $id_book, $price, $status);
    }

    public function deletePurchase($id) {
        return $this->purchaseDTO->deletePurchase($id);
    }

    public function getPurchaseById($id) {
        return $this->purchaseDTO->getPurchaseById($id);
    }
}

?>
