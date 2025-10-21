<?php

class PurchaseController {
    private $purchaseModel;

    public function __construct(PurchaseModel $purchaseModel) {
        $this->purchaseModel = $purchaseModel;
    }

    public function getAllPurchases() {
        return $this->purchaseModel->getAllPurchases();
    }

    public function getTotalRevenue() {
        return $this->purchaseModel->getTotalRevenue();
    }

    public function getActiveCustomers() {
        return $this->purchaseModel->getActiveCustomers();
    }

    public function createPurchase($id_user, $id_book, $price, $status = 'completed') {
        return $this->purchaseModel->createPurchase($id_user, $id_book, $price, $status);
    }

    public function updatePurchase($id, $id_user, $id_book, $price, $status = 'completed') {
        return $this->purchaseModel->updatePurchase($id, $id_user, $id_book, $price, $status);
    }

    public function deletePurchase($id) {
        return $this->purchaseModel->deletePurchase($id);
    }

    public function getPurchaseById($id) {
        return $this->purchaseModel->getPurchaseById($id);
    }
}

?>
